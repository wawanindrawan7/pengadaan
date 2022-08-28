<?php

namespace App\Http\Controllers;

use App\Models\HpeItem;
use App\Models\HpeItemTemp;
use App\Models\Pengadaan;
use App\Models\PengadaanFile;
use App\Models\Perencanaan;
use App\Models\PerencanaanFile;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;


class PerencanaanController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function view(Request $r)
    {
        $pengadaan = Pengadaan::where('state', '>=', 1)->get();
        return view('perencana-pengadaan.view', compact('pengadaan'));
    }

    public function detail(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        $pengadaan_file = PengadaanFile::where('pengadaan_id', $pengadaan->id)->get();
        return view('perencana-pengadaan.detail', compact('pengadaan', 'pengadaan_file'));
    }

    public function form(Request $r)
    {
        $pengadaan = Pengadaan::find($r->pengadaan_id);
        return view('perencana-pengadaan.form', compact('pengadaan'));
    }

    public function create(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = new Perencanaan();
            $p->kategori_kebutuhan = $r->kategori_kebutuhan;
            $p->tgl_penggunaan = date('Y-m-d', strtotime($r->tgl_penggunaan));
            $p->waktu_pelaksanaan = $r->waktu_pelaksanaan;
            $p->strategi_pengadaan = $r->strategi_pengadaan;
            $p->jenis_kontrak = $r->jenis_kontrak;
            $p->tgl_hpe = date('Y-m-d', strtotime($r->tgl_hpe));
            $p->nilai_hpe = $r->nilai_hpe;
            $p->nomor_rks = $r->nomor_rks;
            $p->tgl_rks = date('Y-m-d', strtotime($r->tgl_rks));
            $p->no_nota_dinas = $r->no_nota_dinas;
            $p->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
            $p->pengadaan_id = $r->pengadaan_id;
            $p->users_id = Auth::id();
            $p->save();

            $hpe_item = HpeItemTemp::where('pengadaan_id', $r->pengadaan_id)->get();
            foreach ($hpe_item as $ti) {
                $item = new HpeItem();
                $item->item = $ti->item;
                $item->satuan = $ti->satuan;
                $item->vol_1 = $ti->vol_1;
                $item->vol_2 = $ti->vol_2;
                $item->harga_satuan = $ti->harga_satuan;
                $item->jumlah = $ti->jumlah;
                $item->perencanaan_id = $p->id;
                $item->save();

                $ti->delete();
            }



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

            $pp = Perencanaan::find($r->id);
            $pp->submit = 1;
            $pp->save();

            $p = Pengadaan::find($pp->pengadaan_id);
            $p->state = 2;
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

    public function exportDrp(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        $pdf = FacadePdf::loadView('perencana-pengadaan.drp-pdf', compact('pengadaan'));
        return $pdf->stream();
    }
}
