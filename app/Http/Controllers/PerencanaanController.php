<?php

namespace App\Http\Controllers;

use App\Models\Perencanaan;
use App\Models\PerencanaanFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerencanaanController extends Controller
{
    public function create(Request $r){
        DB::beginTransaction();
        try {
            $p = new Perencanaan();
            $p->user = $r->user;
            $p->kategori_kebutuhan = $r->kategori_kebutuhan;
            $p->tgl_penggunaan = date('Y-m-d', strtotime($r->tgl_penggunaan));
            $p->waktu_pelaksanaan = $r->waktu_pelaksanaan;
            $p->strategi_pengadaan = $r->strategi_pengadaan;
            $p->jenis_kontrak = $r->jenis_kontrak;
            $p->tgl_hpe = date('Y-m-d', strtotime($r->tgl_hpe));
            $p->nilai_hpe = $r->nilai_hpe;
            $p->nomor_rks = $r->nomor_rks;
            $p->tanggal_rks = date('Y-m-d', strtotime($r->tanggal_rks));
            $p->pengadaan_id = $r->pengadaan_id;
            $p->users_id = Auth::id();
            $p->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function perencanaanFile(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file = $r->file('file');
            foreach ($file as $f) {
                $u = new PerencanaanFile();
                $u->kategori = $r->kategori;
                $u->file = 'file/' . date('YmdHis') . '-' . $f->getClientOriginalName();
                $u->perencanaan_id = $r->perencanaan_id;
                $u->save();

                $f->move('file', $u->file);
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
            $p = PerencanaanFile::find($r->id);
            $p->delete();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

}
