<?php

namespace App\Http\Controllers;

use App\Models\FormKhs;
use App\Models\FormKhsDetail;
use App\Models\FormPenilaian;
use App\Models\Pengadaan;
use App\Models\PenilaianVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianVendorController extends Controller
{
    public function formErrect(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_errect', compact('pengadaan'));
    }
    public function formSupplyOnly(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_only', compact('pengadaan'));
    }
    public function formSupplyErrect(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_errect', compact('pengadaan'));
    }
    public function formKhsDistribusiNiaga(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_khs_distribusi_niaga', compact('pengadaan'));
    }

    public function createForm1(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = new PenilaianVendor();
            $p->form = $r->form;
            $p->total = $r->total;
            $p->pelaksanaan_id = $r->pelaksanaan_id;
            $p->kategori = $r->kategori;
            $p->save();

            for ($i=0; $i < count($r->kriteria); $i++) {
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

    public function createForm2(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = new PenilaianVendor();
            $p->form = $r->form;
            $p->total = $r->total;
            $p->pelaksanaan_id = $r->pelaksanaan_id;
            $p->kategori = $r->kategori;
            $p->save();

            // TENAGA KERJA
            $form_khs = new FormKhs();
            $form_khs->penilaian_vendor_id = $p->id;
            $form_khs->nama = $r->tenaga_kerja;
            $form_khs->save();

            for ($i=0; $i < count($r->tk_kriteria); $i++) {
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




            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}


