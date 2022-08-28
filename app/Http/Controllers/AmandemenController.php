<?php

namespace App\Http\Controllers;

use App\Models\Amandemen;
use App\Models\AmandemenFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AmandemenController extends Controller
{
    public function create(Request $r)
    {
        DB::beginTransaction();
        try {
            $a = new Amandemen();
            $a->no_nota_dinas = $r->no_nota_dinas;
            $a->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
            $a->nomor_amandemen = $r->nomor_amandemen;
            $a->tgl_amandemen = date('Y-m-d', strtotime($r->tgl_amandemen));
            $a->tgl_akhir = date('Y-m-d', strtotime($r->tgl_akhir));
            // $a->tgl_selesai_pekerjaan = date('Y-m-d', strtotime($r->tgl_selesai_pekerjaan));
            $a->pengadaan_id = $r->pengadaan_id;
            $a->save();

            $file = $r->file('file');
            foreach ($file as $f) {
                $p = new AmandemenFile();
                $p->file = 'file/' . date('YmdHis') . '-' . $f->getClientOriginalName();
                $p->amandemen_id = $a->id;
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

    

    public function amandemenFile(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file = $r->file('file');
            foreach ($file as $f) {
                $p = new AmandemenFile();
                $p->kategori = $r->kategori;
                $p->file = 'file/' . date('YmdHis') . '-' . $f->getClientOriginalName();
                $p->amandemen_id = $r->amandemen_id;
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
            $p = AmandemenFile::find($r->id);
            $p->delete();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
