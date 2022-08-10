<?php

namespace App\Http\Controllers;

use App\Models\DireksiPk;
use App\Models\Mitra;
use App\Models\Pengadaan;
use App\Models\PengadaanFile;
use App\Models\PengawasK3;
use App\Models\PengawasPk;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengadaanController extends Controller
{
    public function view()
    {
        $user = User::all();
        $pengadaan = Pengadaan::all();
        $unit = Unit::all();
        return view('pengadaan.view', compact('pengadaan','user','unit'));
    }

    public function create(Request $r){
        
        DB::beginTransaction();
        try {
            $p = new Pengadaan();
            $p->nama = $r->nama;
            $p->lokasi = $r->lokasi;
            $p->sumber_anggaran = $r->sumber_anggaran;
            $p->nilai_anggaran = $r->nilai_anggaran;
            $p->jenis = $r->jenis;
            $p->volume = $r->volume;
            $p->metode_pengadaan = $r->metode_pengadaan;
            $p->no_nota_dinas = $r->no_nota_dinas;
            $p->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
            $p->users_id = Auth::id();
            $p->unit_id = $r->unit_id;
            $p->save();

            $direaksi_pk = new DireksiPk();
            $direaksi_pk->pengadaan_id = $p->id;
            $direaksi_pk->users_id = $r->direksi_pk_id;
            $direaksi_pk->save();

            $pengawas_pk = new PengawasPk();
            $pengawas_pk->pengadaan_id = $p->id;
            $pengawas_pk->users_id = $r->pengawas_pk_id;
            $pengawas_pk->save();

            $pengawas_k3 = new PengawasK3();
            $pengawas_k3->pengadaan_id = $p->id;
            $pengawas_k3->users_id = $r->pengawas_k3_id;
            $pengawas_k3->save();


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
            $p = Pengadaan::find($r->id);
            $p->nama = $r->nama;
            $p->lokasi = $r->lokasi;
            $p->sumber_anggaran = $r->sumber_anggaran;
            $p->nilai_anggaran = $r->nilai_anggaran;
            $p->jenis = $r->jenis;
            $p->volume = $r->volume;
            $p->metode_pengadaan = $r->metode_pengadaan;
            $p->no_nota_dinas = $r->no_nota_dinas;
            $p->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
            $p->save();
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

            $p = Pengadaan::find($r->id);
            $p->delete();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }



    public function pengadaanDetail(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        $pengadaan_file = PengadaanFile::where('pengadaan_id',$pengadaan->id)->get();
        $mitra = Mitra::all();
        return view('pengadaan.detail', compact('pengadaan','pengadaan_file','mitra'));
    }



    public function pengadaanDetailCreate(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file = $r->file('file');
            foreach ($file as $f) {
                $u = new PengadaanFile();
                $u->kategori = $r->kategori;
                $u->file = 'file/' . date('YmdHis') . '-' . $f->getClientOriginalName();
                $u->pengadaan_id = $r->pengadaan_id;
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
            $p = PengadaanFile::find($r->id);
            $p->delete();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

}
