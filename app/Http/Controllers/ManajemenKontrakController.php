<?php

namespace App\Http\Controllers;

use App\Models\FormKhsDetail;
use App\Models\FormPenilaian;
use App\Models\FormPenilaianLain;
use App\Models\Mitra;
use App\Models\Pengadaan;
use App\Models\PenilaianVendor;
use App\Models\Unit;
use App\Models\VPenilaian;
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
    
    public function editTglPenilaian(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {

            $p = PenilaianVendor::find($r->id);
            $p->tgl_penilaian = $r->tgl_penilaian;
            $p->dpt_non_dpt = $r->dpt_non_dpt;
            $p->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function resetPenilaian(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = PenilaianVendor::find($r->id);
            $p->delete();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
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

    public function editPenilaianF3(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {

            $item = FormPenilaianLain::find($r->id);
            $item->nilai = $r->nilai;
            $item->save();
            
            $pv = PenilaianVendor::find($item->penilaian_vendor_id);
            $total = FormPenilaianLain::where('penilaian_vendor_id', $pv->id)->sum('nilai');
            if($total > 100){
                return 'error';
            }
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
        $mitra = Mitra::orderBy('nama','asc')->get();
        $mitra_select = null;
        $mitra_id = $r->has('mitra_id') ? $r->mitra_id : 'semua';
        
        $unit = Unit::orderBy('nama','asc')->get();
        $unit_select = null;
        $unit_id = $r->has('unit_id') ? $r->unit_id : 'semua';
        $dr = null;
        
        $u = Auth::user();
        $query = VPenilaian::query();

        if($unit_id != 'semua'){
            $unit_select = Unit::find($unit_id);
            $query = $query->where('unit_id', $unit_id);
        }

        if($mitra_id != 'semua'){
            $mitra_select = Mitra::find($mitra_id);
            $query = $query->where('id', $mitra_id);
        }
       

        if($r->has('dr') && $r->dr != null){
            $dr = $r->dr;
            $d1 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 0, 10))) : date('Y-m-d');
            $d2 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 13))) : date('Y-m-d');
            $query = $query->where('tgl_kontrak', '>=', $d1)->where('tgl_kontrak', '<=', $d2);
        }


        if($u->status == 'Admin'){  
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit'){
            // return Auth::user()->uid;
            $query = $query->where('unit_id', Auth::user()->uid);
        }else{
            $query = $query->where(function($q){
                return $q->where('dpk_users_id', Auth::id())->orWhere('pk_users_id', Auth::id())->orWhere('pk3_users_id', Auth::id())->orWhere('peng_users_id', Auth::id());
            });
        }

        $rekap = $query->get();
        return view('pengadaan.kontrak-rekap', compact('rekap','unit','unit_select','dr','mitra','mitra_select'));
    }
    
    public function export(Request $r)
    {
       
        $mitra_id = $r->has('mitra_id') ? $r->mitra_id : 'semua';
        
        
        $unit_id = $r->has('unit_id') ? $r->unit_id : 'semua';
        $dr = null;
        
        $u = Auth::user();
        $query = VPenilaian::query();

        if($unit_id != 'semua'){
            $query = $query->where('unit_id', $unit_id);
        }

        if($mitra_id != 'semua'){
            $query = $query->where('id', $mitra_id);
        }
       

        if($r->has('dr') && $r->dr != null){
            $dr = $r->dr;
            $d1 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 0, 10))) : date('Y-m-d');
            $d2 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 13))) : date('Y-m-d');
            $query = $query->where('tgl_kontrak', '>=', $d1)->where('tgl_kontrak', '<=', $d2);
        }


        if($u->status == 'Admin'){  
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit'){
            // return Auth::user()->uid;
            $query = $query->where('unit_id', Auth::user()->uid);
        }else{
            $query = $query->where(function($q){
                return $q->where('dpk_users_id', Auth::id())->orWhere('pk_users_id', Auth::id())->orWhere('pk3_users_id', Auth::id())->orWhere('peng_users_id', Auth::id());
            });
        }

        $rekap = $query->get();
        
        $res = [];
        $no = 1;
        foreach ($rekap as $rek) {
            array_push($res, array(
                'no' => $no++,
                'peng_nama' => $rek->peng_nama,
                'lokasi' => $rek->lokasi,
                'nomor_kontrak' => $rek->nomor_kontrak,
                'tgl_kontrak' => $rek->tgl_kontrak,
                'mitra' => $rek->nama,
                'tgl_efektif' => $rek->tgl_efektif,
                'tgl_akhir' => $rek->tgl_akhir,
                'nilai_kontrak' => $rek->nilai_kontrak,
                'unit' => $rek->unit_nama,
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
