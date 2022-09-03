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
            $p->tgl_idd = date('Y-m-d', strtotime($r->tgl_idd));
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



    public function uploadFile(Request $r)
    {
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
