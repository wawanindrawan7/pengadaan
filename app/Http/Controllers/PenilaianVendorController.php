<?php

namespace App\Http\Controllers;

use App\Models\FormKhs;
use App\Models\FormKhsDetail;
use App\Models\FormPenilaian;
use App\Models\Mitra;
use App\Models\Pengadaan;
use App\Models\PenilaianVendor;
use App\Models\Unit;
use App\Models\VPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;

class PenilaianVendorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function formErrect(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_errect', compact('pengadaan'));
    }
    public function formSupplyOnly(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_only', compact('pengadaan'));
    }
    public function formSupplyErrect(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_errect', compact('pengadaan'));
    }
    public function formKhsDistribusiNiaga(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_khs_distribusi_niaga', compact('pengadaan'));
    }

    public function createForm1(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = new PenilaianVendor();
            $p->form = $r->form;
            $p->total = $r->total;
            $p->pelaksanaan_id = $r->pelaksanaan_id;
            $p->kategori = $r->kategori;
            $p->dpt_non_dpt = $r->dpt_non_dpt;
            $p->tgl_penilaian = $r->tgl_penilaian;
            $p->ket = $r->ket;
            $p->save();

            for ($i = 0; $i < count($r->kriteria); $i++) {
                $fp = new FormPenilaian();
                $fp->kriteria = $r->kriteria[$i];
                $fp->bobot = $r->bobot[$i];
                $fp->nilai = $r->nilai[$i];
                $fp->nilai_bobot = $r->nilai_bobot[$i];
                $fp->penilaian_vendor_id = $p->id;
                $fp->save();
            }

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function createForm2(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = new PenilaianVendor();
            $p->form = $r->form;
            $p->total = $r->total;
            $p->pelaksanaan_id = $r->pelaksanaan_id;
            $p->kategori = $r->kategori;
            $p->dpt_non_dpt = $r->dpt_non_dpt;
            $p->tgl_penilaian = $r->tgl_penilaian;
            $p->ket = $r->ket;
            $p->save();

            // TENAGA KERJA
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->tenaga_kerja;
            $form_khs->save();

            for ($i = 0; $i < count($r->tk_kriteria); $i++) {
                # code...
                $form_khs_detail = new FormKhsDetail();
                $form_khs_detail->kriteria = $r->tk_kriteria[$i];
                $form_khs_detail->bobot = $r->tk_bobot[$i];
                $form_khs_detail->nilai = $r->tk_nilai[$i];
                $form_khs_detail->nilai_bobot = $r->tk_nilai_bobot[$i];
                $form_khs_detail->form_khs_id = $form_khs->id;
                $form_khs_detail->save();
            }
            // ----------------------------------------

            // SOP/INSTRUKSI KERJA
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->sop;
            $form_khs->save();
            for ($i = 0; $i < count($r->sop_kriteria); $i++) {
                # code...
                $form_khs_detail = new FormKhsDetail();
                $form_khs_detail->kriteria = $r->sop_kriteria[$i];
                $form_khs_detail->bobot = $r->sop_bobot[$i];
                $form_khs_detail->nilai = $r->sop_nilai[$i];
                $form_khs_detail->nilai_bobot = $r->sop_nilai_bobot[$i];
                $form_khs_detail->form_khs_id = $form_khs->id;
                $form_khs_detail->save();
            }

            //3. SISTEM MANAJEMEN KERJA
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->smk;
            $form_khs->save();
            for ($i = 0; $i < count($r->smk_kriteria); $i++) {
                # code...
                $form_khs_detail = new FormKhsDetail();
                $form_khs_detail->kriteria = $r->smk_kriteria[$i];
                $form_khs_detail->bobot = $r->smk_bobot[$i];
                $form_khs_detail->nilai = $r->smk_nilai[$i];
                $form_khs_detail->nilai_bobot = $r->smk_nilai_bobot[$i];
                $form_khs_detail->form_khs_id = $form_khs->id;
                $form_khs_detail->save();
            }

            //4. Penggunaan Alat Pelindung Diri (APD)
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->papd;
            $form_khs->save();
            for ($i = 0; $i < count($r->phpd_kriteria); $i++) {
                # code...
                $form_khs_detail = new FormKhsDetail();
                $form_khs_detail->kriteria = $r->phpd_kriteria[$i];
                $form_khs_detail->bobot = $r->phpd_bobot[$i];
                $form_khs_detail->nilai = $r->phpd_nilai[$i];
                $form_khs_detail->nilai_bobot = $r->phpd_nilai_bobot[$i];
                $form_khs_detail->form_khs_id = $form_khs->id;
                $form_khs_detail->save();
            }
            //5. Peralatan Kerja
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->pk;
            $form_khs->save();
            for ($i = 0; $i < count($r->pk_kriteria); $i++) {
                # code...
                $form_khs_detail = new FormKhsDetail();
                $form_khs_detail->kriteria = $r->pk_kriteria[$i];
                $form_khs_detail->bobot = $r->pk_bobot[$i];
                $form_khs_detail->nilai = $r->pk_nilai[$i];
                $form_khs_detail->nilai_bobot = $r->pk_nilai_bobot[$i];
                $form_khs_detail->form_khs_id = $form_khs->id;
                $form_khs_detail->save();
            }


            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    

    public function export(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        // return $pengadaan->pelaksanaan->penilaianVendor;
        if (
            $pengadaan->pelaksanaan->penilaianVendor->form == 'Errect' ||
            $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Only' ||
            $pengadaan->pelaksanaan->penilaianVendor->form == 'Supply Errect'
        ) {

            $pdf = FacadePdf::loadView('penilaian_vendor.form1', compact('pengadaan'));
            return $pdf->stream();
        } else {
            $pdf = FacadePdf::loadView('penilaian_vendor.form2', compact('pengadaan'));
            return $pdf->stream();
        }
    }

    public function rekap(Request $r)
    {
        
        $mitra = Mitra::orderBy('nama','asc')->get();
        $unit = Unit::orderBy('nama','asc')->get();
        $unit_select = null;
        $unit_id = $r->has('unit_id') ? $r->unit_id : 'semua';

        $rekap = [];
        $count_rekap = [];

        $mitra_select = null;
        $mitra_id = $r->has('mitra_id') ? $r->mitra_id : 'semua';
        $cat = $r->has('cat') ? $r->cat : 'semua';

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
        if($cat != 'semua'){
            $query = $query->where('dpt_non_dpt', $cat);
        }

        if($r->has('dr') && $r->dr != null){
            $dr = $r->dr;
            $d1 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 0, 10))) : date('Y-m-d');
            $d2 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 13))) : date('Y-m-d');
            $query = $query->where('tgl_akhir', '>=', $d1)->where('tgl_akhir', '<=', $d2);
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
        // return $rekap;


        $count_rekap = $this->countRekap($rekap);

        // return $count_rekap;
        

        return view('penilaian_vendor.rekap', compact('mitra','rekap','mitra_select','cat','count_rekap','unit','unit_select','dr'));

    }

    public function countRekap($rekap){
        $belum_selesai = 0;
        $selesai = 0;
        $sudah_dinilai = 0;
        $belum_dinilai = 0;

        $baik = 0;
        $cukup = 0;
        $buruk = 0;

        foreach ($rekap as $u) {
            if ( $u->tgl_akhir != null && (strtotime(date('Y-m-d')) >= strtotime($u->tgl_akhir) || $u->tgl_selesai != NULL)){
                $selesai += 1;
                if($u->pv_kategori != NULL){
                    $sudah_dinilai += 1;

                    if($u->pv_kategori == 'Baik'){
                        $baik += 1;
                    }elseif($u->pv_kategori == 'Cukup'){
                        $cukup += 1;
                    }elseif($u->pv_kategori == 'Buruk'){
                        $buruk += 1;
                    }
                }else{
                    $belum_dinilai += 1;
                }
            }else{
                $belum_selesai += 1;
            }
        }

        return ['belum_selesai' => $belum_selesai, 'selesai' => $selesai, 'sudah_dinilai' => $sudah_dinilai, 'belum_dinilai' => $belum_dinilai, 'baik' => $baik, 'cukup' => $cukup, 'buruk' => $buruk];
    }

    public function exportRekap(Request $r)
    {

        $unit_id = $r->has('unit_id') ? $r->unit_id : 'semua';
        $rekap = [];
    
        $mitra_id = $r->has('mitra_id') ? $r->mitra_id : 'semua';
        $cat = $r->has('cat') ? $r->cat : 'semua';

        $u = Auth::user();
        $query = VPenilaian::query();

        if($unit_id != 'semua'){
            $query = $query->where('unit_id', $unit_id);
        }

        if($mitra_id != 'semua'){
            $mitra_select = Mitra::find($mitra_id);
            $query = $query->where('id', $mitra_id);
        }
        
        if($cat != 'semua'){
            $query = $query->where('dpt_non_dpt', $cat);
        }

        if($r->has('dr') && $r->dr != null){
            $dr = $r->dr;
            $d1 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 0, 10))) : date('Y-m-d');
            $d2 = ($r->has('dr')) ? date('Y-m-d', strtotime(substr($dr, 13))) : date('Y-m-d');
            $query = $query->where('tgl_akhir', '>=', $d1)->where('tgl_akhir', '<=', $d2);
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
        // return $rekap;

        $res = [];
        $no = 1;
        foreach ($rekap as $rek) {
            array_push($res, array(
                'no' => $no++,
                'mitra' => $rek->nama,
                'peng_nama' => $rek->peng_nama,
                'nomor_kontrak' => $rek->nomor_kontrak,
                'nilai_kontrak' => $rek->nilai_kontrak,
                'tgl_kontrak' => $rek->tgl_kontrak,
                'tgl_selesai' => $rek->tgl_selesai,
                'total' => $rek->total,
                'pv_kategori' => $rek->pv_kategori,
                'dpt_non_dpt' => $rek->dpt_non_dpt,
            ));
        }


        $reader = IOFactory::createReader('Xlsx');
        $excel = $reader->load('penilaian-vendor.xlsx');
        $excel->setActiveSheetIndex(0);
        $start = 5;
        $excel->getActiveSheet()->fromArray($res, null, 'A' . $start, false, false);
        $end = ($start + count($res) - 1);
        $filename = 'REKAP PENILAIAN VENDOR';
        $excel->getActiveSheet()->getStyle('A'.$start.':J'.$end)->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);


        // $excel->getActiveSheet()->setCellValue("B2", ($mitra_select != null) ? ': '.$mitra_select->nama : ': Semua');


        // $excel->setActiveSheetIndex(1);
        // $count_rekap = $this->countRekap($rekap);
        // $excel->getActiveSheet()->setCellValue("C6", $count_rekap['selesai']);
        // $excel->getActiveSheet()->setCellValue("C7", $count_rekap['sudah_dinilai']);
        // $excel->getActiveSheet()->setCellValue("C8", $count_rekap['belum_dinilai']);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
        
    }
}
