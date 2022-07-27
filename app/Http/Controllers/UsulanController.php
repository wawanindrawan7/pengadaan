<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsulanController extends Controller
{
    public function view()
    {
        $unit = Unit::all();
        $usulan = Usulan::all();
        return view('usulan.view', compact('usulan','unit'));
    }

    public function create(Request $r){
        DB::beginTransaction();
        try {
            $u = new Usulan();
            $u->deskripsi = $r->deskripsi;
            $u->jenis_pekerjaan = $r->jenis_pekerjaan;
            $u->kategori = $r->kategori;
            $u->tipe = $r->tipe;
            $u->nilai = $r->nilai;
            $u->no_surat_usulan = $r->no_surat_usulan;
            $u->tgl_usulan = date('Y-m-d', strtotime($r->tgl_usulan));
            $u->no_pr = $r->no_pr;
            $u->keterangan = $r->keterangan;
            $u->unit_id = $r->unit_id;
            $u->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function update(Request $r){
        DB::beginTransaction();
        try {
            $u = Usulan::find($r->id);
            $u->deskripsi = $r->deskripsi;
            $u->jenis_pekerjaan = $r->jenis_pekerjaan;
            $u->kategori = $r->kategori;
            $u->tipe = $r->tipe;
            $u->nilai = $r->nilai;
            $u->no_surat_usulan = $r->no_surat_usulan;
            $u->tgl_usulan = date('Y-m-d', strtotime($r->tgl_usulan));
            $u->no_pr = $r->no_pr;
            $u->keterangan = $r->keterangan;
            $u->unit_id = $r->unit_id;
            $u->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function delete(Request $r)
    {
        DB::beginTransaction();
        try {

            $b = Usulan::find($r->id);
            $b->delete();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
