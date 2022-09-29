<?php

namespace App\Http\Controllers;

use App\Models\FormKhsDetail;
use App\Models\FormPenilaian;
use App\Models\Pengadaan;
use App\Models\PenilaianVendor;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ManajemenKontrakController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function view(Request $r)
    {
        $pengadaan = Pengadaan::where('state', '>=', 3)->get();
        return view('manajemen-kontrak.view', compact('pengadaan'));
    }
    
    public function editPenilaianF1(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {

            $item = FormPenilaian::find($r->id);
            $item->nilai = $r->nilai;
            $item->nilai_bobot = ($item->bobot * $item->nilai) / 100;
            $item->save();
            
            $pv = PenilaianVendor::find($item->penilaian_vendor_id);
            $total = FormPenilaian::where('penilaian_vendor_id', $pv->id)->sum('nilai_bobot');
            $pv->total = $total;
            if ($total >= 80) {
                $pv->kategori = 'Baik';
            } else if ($total >= 60 && $total < 80) {
                $pv->kategori = 'Cukup';
            } else {
                $pv->kategori = 'Buruk';
            }
            $pv->save();
            
            
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function editPenilaianF2(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {

            $item = FormKhsDetail::find($r->id);
            $item->nilai = $r->nilai;
            $item->nilai_bobot = ($item->bobot * $item->nilai) / 10;
            $item->save();

            $pv = PenilaianVendor::find($item->formKhs->penilaian_vendor_id);

            $total = FormKhsDetail::whereHas('formKhs', function($q)use($pv){
                return $q->where('penilaian_vendor_id',  $pv->id);
            })->sum('nilai_bobot');

            $pv->total = $total;
            if ($total >= 80) {
                $pv->kategori = 'Baik';
            } else if ($total >= 60 && $total < 80) {
                $pv->kategori = 'Cukup';
            } else {
                $pv->kategori = 'Buruk';
            }
            $pv->save();
            
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    
    public function uploadPenilaianFile(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $file = $r->file('file');
            
            $p = PenilaianVendor::find($r->id);
            $p->file = 'file/' . date('YmdHis') . '-' . $file->getClientOriginalName();
            $p->save();
            
            $file->move('file', $p->file);
            
            
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    
    public function rekap(Request $r)
    {
        $unit = Unit::all();
        
        $u = Auth::user();
        if($u->status == 'Admin'){
            $pengadaan = Pengadaan::whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit'){
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }else{
            $pengadaan = Pengadaan::where('users_id', $u->id)
            ->orWhereHas('direksiPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasK3', function($q){
                return $q->where('users_id', Auth::id());
            })->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }
        return view('pengadaan.kontrak-rekap', compact('pengadaan','unit'));
    }
    
    public function export(Request $r)
    {
        $u = Auth::user();
        if($u->status == 'Admin'){
            $pengadaan = Pengadaan::orderBy('id','desc')->get();
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit'){
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }else{
            $pengadaan = Pengadaan::where('users_id', $u->id)
            ->orWhereHas('direksiPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasK3', function($q){
                return $q->where('users_id', Auth::id());
            })->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }
        
        $res = [];
        $no = 1;
        foreach ($pengadaan as $rek) {
            array_push($res, array(
                'no' => $no++,
                'peng_nama' => $rek->nama,
                'lokasi' => $rek->unit->lokasi,
                'nomor_kontrak' => $rek->pelaksanaan->nomor_kontrak,
                'tgl_kontrak' => $rek->pelaksanaan->tgl_kontrak,
                'mitra' => $rek->pelaksanaan->mitra->nama,
                'tgl_efektif' => $rek->pelaksanaan->tgl_efektif,
                'tgl_akhir' => $rek->pelaksanaan->tgl_akhir,
                'nilai_kontrak' => $rek->pelaksanaan->nilai_kontrak,
                'unit' => $rek->unit->nama,
                'metode_pengadaan' => $rek->metode_pengadaan,
            ));
        }
        
        
        $reader = IOFactory::createReader('Xlsx');
        $excel = $reader->load('rekap-kontrak.xlsx');
        $start = 4;
        $excel->getActiveSheet()->fromArray($res, null, 'A' . $start, false, false);
        $end = ($start + count($res) - 1);
        $filename = 'REKAP KONTRAK';
        $excel->getActiveSheet()->getStyle('A'.$start.':K'.$end)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);
        
        
        
        
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
    }
}
