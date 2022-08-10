<?php

namespace App\Http\Controllers;

use App\Models\Pelaksanaan;
use App\Models\PelaksanaanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaanController extends Controller
{
    public function create(Request $r)
    {
        DB::beginTransaction();
        try {
            $p = new Pelaksanaan();
            $p->nomor_kontrak = $r->nomor_kontrak;
            $p->tgl_kontrak = date('Y-m-d', strtotime($r->tgl_kontrak));
            $p->tgl_efektif = date('Y-m-d', strtotime($r->tgl_efektif));
            $p->tgl_akhir = date('Y-m-d', strtotime($r->tgl_akhir));
            $p->nilai_kontrak = $r->nilai_kontrak;
            $p->mitra_id = $r->mitra_id;
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


    public function pelaksanaanFile(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file = $r->file('file');
            foreach ($file as $f) {
                $p = new PelaksanaanFile();
                $p->kategori = $r->kategori;
                $p->file = 'file/' . date('YmdHis') . '-' . $f->getClientOriginalName();
                $p->pelaksanaan_id = $r->pelaksanaan_id;
                $p->save();

                $f->move('file', $p->file);
            }

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function deleteFile(Request $r)
    {
        DB::beginTransaction();
        try {
            $p = PelaksanaanFile::find($r->id);
            $p->delete();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
