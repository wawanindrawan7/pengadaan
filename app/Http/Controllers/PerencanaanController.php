<?php

namespace App\Http\Controllers;

use App\Models\HpeItem;
use App\Models\HpeItemTemp;
use App\Models\Pengadaan;
use App\Models\PengadaanFile;
use App\Models\Perencanaan;
use App\Models\PerencanaanFile;
use App\Models\UsersReviewer;
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

    public function loadKhsKontrak(){
        $kontrak = Pengadaan::whereHas('perencanaan', function($q){
            return $q->where('jenis_kontrak', 'KHS');
        })->whereHas('pelaksanaan')->with('pelaksanaan.mitra')->get();

        return compact('kontrak');
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
            $p->nomor_pakta_integritas = $r->nomor_pakta_integritas;
            $p->tgl_pakta_integritas = date('Y-m-d', strtotime($r->tgl_pakta_integritas));
            $p->tgl_drp = date('Y-m-d', strtotime($r->tgl_drp));
            $p->kebutuhan = $r->kebutuhan;
            $p->volume = $r->volume;
            $p->jumlah_pengguna = $r->jumlah_pengguna;
            $p->penyedia = $r->penyedia;
            $p->jumlah_vendor = $r->jumlah_vendor;
            // $p->tgl_nota_dinas = date('Y-m-d', strtotime($r->tgl_nota_dinas));
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
    
    public function update(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = Perencanaan::find($r->id);
            // return $p;
            $p->tgl_penggunaan = date('Y-m-d', strtotime($r->tgl_penggunaan));
            $p->waktu_pelaksanaan = $r->waktu_pelaksanaan;
            $p->kategori_kebutuhan = $r->kategori_kebutuhan;
            $p->strategi_pengadaan = $r->strategi_pengadaan;
            $p->jenis_kontrak = $r->jenis_kontrak;
            $p->nilai_hpe = $r->nilai_hpe;
            $p->tgl_hpe = date('Y-m-d', strtotime($r->tgl_hpe));
            $p->tgl_rks = date('Y-m-d', strtotime($r->tgl_rks));
            $p->nomor_rks = $r->nomor_rks;
            $p->nomor_pakta_integritas = $r->nomor_pakta_integritas;
            $p->tgl_pakta_integritas = $r->tgl_pakta_integritas;
            $p->tgl_drp = $r->tgl_drp;
            $p->kebutuhan = $r->kebutuhan;
            $p->volume = $r->volume;
            $p->jumlah_pengguna = $r->jumlah_pengguna;
            $p->penyedia = $r->penyedia;
            $p->jumlah_vendor = $r->jumlah_vendor;
            $p->save();

            if(count($r->users_komite_id) > 0){
                $pengadaan = Pengadaan::find($p->pengadaan_id);
                //del old vfm
                $vfm = UsersReviewer::where('pengadaan_id', $p->pengadaan_id)->delete();

                foreach($r->users_komite_id as $uid){
                    $nvfm = new UsersReviewer();
                    $nvfm->pengadaan_id = $p->pengadaan_id;
                    $nvfm->users_id = $uid;
                    $nvfm->save();
                }
            }

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    
    public function editHpe(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $item = HpeItem::find($r->id);
            $item->item = $r->item;
            $item->satuan = $r->satuan;
            $item->vol_1 = $r->vol_1;
            $item->vol_2 = $r->vol_2;
            $item->harga_satuan = $r->harga_satuan;
            $item->jumlah = $r->jumlah;
            $item->save();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    public function updateNoDin(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $p = Perencanaan::find($r->id);
            // return $p;
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
    
    public function uploadFile1(Request $r)
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
    
    public function uploadFile(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $file_rks = ($r->hasFile('file_rks')) ? $r->file('file_rks') : null;
            $file_pakta_integritas = ($r->hasFile('file_pakta_integritas')) ? $r->file('file_pakta_integritas') : null;
            $file_drp = ($r->hasFile('file_drp')) ? $r->file('file_drp') : null;
            $file_nota_dinas = ($r->hasFile('file_nota_dinas')) ? $r->file('file_nota_dinas') : null;
            $file_hpe = ($r->hasFile('file_hpe')) ? $r->file('file_hpe') : null;
            
            $p = Perencanaan::find($r->perencanaan_id);
            
            
            $u = ($p->perencanaanFile == null) ? new PerencanaanFile() : PerencanaanFile::find($p->perencanaanFile->id);
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
            $u->perencanaan_id = $r->perencanaan_id;
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
    
    public function exportPaktaIntegritas(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        $pdf = FacadePdf::loadView('perencana-pengadaan.pakta_integritas_pdf', compact('pengadaan'));
        return $pdf->stream();
    }
    
    public function exportHpe(Request $r)
    {
        $pengadaan = Pengadaan::find($r->id);
        $pdf = FacadePdf::loadView('perencana-pengadaan.hpe_export', compact('pengadaan'));
        return $pdf->stream();
    }
}
