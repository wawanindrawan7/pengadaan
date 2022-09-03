<?php

namespace App\Http\Controllers;

use App\Models\FormKhs;
use App\Models\FormKhsDetail;
use App\Models\FormPenilaian;
use App\Models\Pengadaan;
use App\Models\PenilaianVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class PenilaianVendorController extends Controller
{
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
}
