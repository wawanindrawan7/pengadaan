<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Pelaksanaan;
use App\Models\PelaksanaanFile;
use App\Models\Pengadaan;
use App\Models\PengadaanFile;
use Barryvdh\DomPDF\PDF;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaanController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function view(Request $r)
    {
        $pengadaan = Pengadaan::where('state', '>=', 2)->get();
        return view('pelaksana-pengadaan.view', compact('pengadaan'));
    }

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

    public function createIDD(Request $r)
    {
        DB::beginTransaction();
        try {
            $file_dokumen_kusioner = ($r->hasFile('file_dokumen_kusioner')) ? $r->file('file_dokumen_kusioner') : null;
            $file_dokumen_penilaian = ($r->hasFile('file_dokumen_penilaian')) ? $r->file('file_dokumen_penilaian') : null;
            $file_dokumen_pendukung = ($r->hasFile('file_dokumen_pendukung')) ? $r->file('file_dokumen_pendukung') : null;

            $p = Pelaksanaan::find($r->pelaksanaan_id);
            $p->tgl_idd = date('Y-m-d', strtotime($r->tgl_idd));
            $p->save();

            $u = ($p->pelaksanaanFile == null) ? new PelaksanaanFile() : PelaksanaanFile::find($p->pelaksanaanFile->id);
            if ($file_dokumen_kusioner != null) {
                $u->file_dokumen_kusioner = 'file/' . date('YmdHis') . '-' . $file_dokumen_kusioner->getClientOriginalName();
            }
            if ($file_dokumen_penilaian != null) {
                $u->file_dokumen_penilaian = 'file/' . date('YmdHis') . '-' . $file_dokumen_penilaian->getClientOriginalName();
            }
            if ($file_dokumen_pendukung != null) {
                $u->file_dokumen_pendukung = 'file/' . date('YmdHis') . '-' . $file_dokumen_pendukung->getClientOriginalName();
            }
            $u->pelaksanaan_id = $r->pelaksanaan_id;

            $u->save();

            if ($file_dokumen_kusioner != null) {
                $file_dokumen_kusioner->move('file', $u->file_dokumen_kusioner);
            }
            if ($file_dokumen_penilaian != null) {
                $file_dokumen_penilaian->move('file', $u->file_dokumen_penilaian);
            }
            if ($file_dokumen_pendukung != null) {
                $file_dokumen_pendukung->move('file', $u->file_dokumen_pendukung);
            }
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

    public function detail(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        $pengadaan_file = PengadaanFile::where('pengadaan_id', $pengadaan->id)->get();
        $mitra = Mitra::all();
        return view('pelaksana-pengadaan.detail', compact('pengadaan', 'pengadaan_file','mitra'));
    }


    public function submit(Request $r)
    {
        DB::beginTransaction();
        try {

            $pp = Pelaksanaan::find($r->id);
            $pp->submit = 1;
            $pp->save();

            $p = Pengadaan::find($pp->pengadaan_id);
            $p->state = 4;
            $p->save();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function selesai(Request $r)
    {
        DB::beginTransaction();
        try {
            $p = Pelaksanaan::find($r->id);
            $p->tgl_selesai = date('Y-m-d', strtotime($r->tgl_selesai));
            $p->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }




    public function uploadFile(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $file_jadwal = ($r->hasFile('file_jadwal')) ? $r->file('file_jadwal') : null;
            $file_hps = ($r->hasFile('file_hps')) ? $r->file('file_hps') : null;
            $file_kontrak = ($r->hasFile('file_kontrak')) ? $r->file('file_kontrak') : null;
            $file_jaminan_pelaksana = ($r->hasFile('file_jaminan_pelaksana')) ? $r->file('file_jaminan_pelaksana') : null;
            

            $p = Pelaksanaan::find($r->pelaksanaan_id);


            $u = ($p->pelaksanaanFile == null) ? new PelaksanaanFile() : PelaksanaanFile::find($p->pelaksanaanFile->id);
            if ($file_jadwal != null) {
                $u->file_jadwal = 'file/' . date('YmdHis') . '-' . $file_jadwal->getClientOriginalName();
            }
            if ($file_hps != null) {
                $u->file_hps = 'file/' . date('YmdHis') . '-' . $file_hps->getClientOriginalName();
            }
            if ($file_kontrak != null) {
                $u->file_kontrak = 'file/' . date('YmdHis') . '-' . $file_kontrak->getClientOriginalName();
            }
            if ($file_jaminan_pelaksana != null) {
                $u->file_jaminan_pelaksana = 'file/' . date('YmdHis') . '-' . $file_jaminan_pelaksana->getClientOriginalName();
            }
            
            $u->pelaksanaan_id = $r->pelaksanaan_id;

            $u->save();
            if ($file_jadwal != null) {
                $file_jadwal->move('file', $u->file_jadwal);
            }
            if ($file_hps != null) {
                $file_hps->move('file', $u->file_hps);
            }
            if ($file_kontrak != null) {
                $file_kontrak->move('file', $u->file_kontrak);
            }
            if ($file_jaminan_pelaksana != null) {
                $file_jaminan_pelaksana->move('file', $u->file_jaminan_pelaksana);
            }
            
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function uploadFileIDD(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {

            $file_dokumen_kusioner = ($r->hasFile('file_dokumen_kusioner')) ? $r->file('file_dokumen_kusioner') : null;
            $file_dokumen_penilaian = ($r->hasFile('file_dokumen_penilaian')) ? $r->file('file_dokumen_penilaian') : null;
            $file_dokumen_pendukung = ($r->hasFile('file_dokumen_pendukung')) ? $r->file('file_dokumen_pendukung') : null;
            
            

            $p = Pelaksanaan::find($r->pelaksanaan_id);


            $u = ($p->pelaksanaanFile == null) ? new PelaksanaanFile() : PelaksanaanFile::find($p->pelaksanaanFile->id);
            if ($file_dokumen_kusioner != null) {
                $u->file_dokumen_kusioner = 'file/' . date('YmdHis') . '-' . $file_dokumen_kusioner->getClientOriginalName();
            }
            if ($file_dokumen_penilaian != null) {
                $u->file_dokumen_penilaian = 'file/' . date('YmdHis') . '-' . $file_dokumen_penilaian->getClientOriginalName();
            }
            if ($file_dokumen_pendukung != null) {
                $u->file_dokumen_pendukung = 'file/' . date('YmdHis') . '-' . $file_dokumen_pendukung->getClientOriginalName();
            }
            
            $u->pelaksanaan_id = $r->pelaksanaan_id;

            $u->save();
            
            if ($file_dokumen_kusioner != null) {
                $file_dokumen_kusioner->move('file', $u->file_dokumen_kusioner);
            }
            if ($file_dokumen_penilaian != null) {
                $file_dokumen_penilaian->move('file', $u->file_dokumen_penilaian);
            }
            if ($file_dokumen_pendukung != null) {
                $file_dokumen_pendukung->move('file', $u->file_dokumen_pendukung);
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
