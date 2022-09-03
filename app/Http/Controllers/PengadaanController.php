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
use App\Models\UsersReviewer;
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

            foreach ($r->users_komite_id as $uk_id) {
                $ur = new UsersReviewer();
                $ur->pengadaan_id = $p->id;
                $ur->users_id = $uk_id;
                $ur->save();
            }


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

    public function submit(Request $r)
    {
        DB::beginTransaction();
        try {

            $p = Pengadaan::find($r->id);
            $p->submit = 1;
            $p->state = ($p->metode_pengadaan == 'Kontrak Rinci' || $p->metode_pengadaan == 'Pengadaan Langsung') ? 2 : 1;
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
        $tab = $r->has('tab') ? $r->tab : 'inisiasi';
        $pengadaan = Pengadaan::find($r->id);
        $pengadaan_file = PengadaanFile::where('pengadaan_id',$pengadaan->id)->get();
        $mitra = Mitra::all();
        return view('pengadaan.detail', compact('pengadaan','pengadaan_file','mitra','tab'));
    }



    public function pengadaanFileCreate(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file_rks = ($r->hasFile('file_rks')) ? $r->file('file_rks') : null;
            $file_pakta_integritas = ($r->hasFile('file_pakta_integritas')) ? $r->file('file_pakta_integritas') : null;
            $file_drp = ($r->hasFile('file_drp')) ? $r->file('file_drp') : null;
            $file_nota_dinas = ($r->hasFile('file_nota_dinas')) ? $r->file('file_nota_dinas') : null;
            $file_hpe = ($r->hasFile('file_hpe')) ? $r->file('file_hpe') : null;

            $p = Pengadaan::find($r->pengadaan_id);


            $u = ($p->pengadaanFile == null) ? new PengadaanFile() : PengadaanFile::find($p->pengadaanFile->id);
            if ($file_rks != null) {
                $u->file_rks = 'file/' . date('YmdHis') . '-' . $file_rks->getClientOriginalName();
            }
            if ($file_pakta_integritas != null) {
                $u->file_pakta_integritas = 'file/' . date('YmdHis') . '-' . $file_pakta_integritas->getClientOriginalName();
            }
            if ($file_drp != null) {
                $u->file_drp = 'file/' . date('YmdHis') . '-' . $file_drp->getClientOriginalName();
            }
            if ($file_nota_dinas != null) {
                $u->file_nota_dinas = 'file/' . date('YmdHis') . '-' . $file_nota_dinas->getClientOriginalName();
            }
            if ($file_hpe != null) {
                $u->file_hpe = 'file/' . date('YmdHis') . '-' . $file_hpe->getClientOriginalName();
            }
            $u->pengadaan_id = $r->pengadaan_id;
            $u->save();
            if ($file_rks != null) {
                $file_rks->move('file', $u->file_rks);
            }
            if ($file_pakta_integritas != null) {
                $file_pakta_integritas->move('file', $u->file_pakta_integritas);
            }
            if ($file_drp != null) {
                $file_drp->move('file', $u->file_drp);
            }
            if ($file_nota_dinas != null) {
                $file_nota_dinas->move('file', $u->file_nota_dinas);
            }
            if ($file_hpe != null) {
                $file_hpe->move('file', $u->file_hpe);
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
