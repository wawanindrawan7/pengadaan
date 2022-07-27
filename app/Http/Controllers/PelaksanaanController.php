<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaanController extends Controller
{
    public function create(Request $r)
    {
        DB::beginTransaction();
        try {
            $p = new Pelaksanaan();
            $p->no_nota_dinas = $r->no_nota_dinas;
            $p->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
            $p->pengadaan_id = $r->pengadaan_id;
            $p->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }



    public function update(Request $r)
    {
        DB::beginTransaction();
        try {
            $p = Pelaksanaan::find($r->id);
            $p->nomor_kontrak = $r->nomor_kontrak;
            $p->tgl_kontrak = date('Y-m-d', strtotime($r->tgl_kontrak));
            $p->penyedia_barang_jasa = $r->penyedia_barang_jasa;
            $p->tgl_efektif = date('Y-m-d', strtotime($r->tgl_efektif));
            $p->tgl_akhir = date('Y-m-d', strtotime($r->tgl_akhir));
            $p->nilai_kontrak = $r->nilai_kontrak;
            $p->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
