<?php

namespace App\Http\Controllers;

use App\Imports\PengadaanImport;
use App\Models\DireksiPk;
use App\Models\Mitra;
use App\Models\Pelaksanaan;
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
use Maatwebsite\Excel\Facades\Excel;

class PengadaanController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function view()
    {
        $user = User::all();
        $unit = Unit::all();
        
        $u = Auth::user();
        
        if ($u->status == 'Admin') {
            $pengadaan = Pengadaan::orderBy('id', 'desc')->get();
        } elseif ($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit') {
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->orderBy('id', 'desc')->get();
        } else {
            $pengadaan = Pengadaan::where('users_id', $u->id)
            ->orWhereHas('direksiPk', function ($q) {
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasPk', function ($q) {
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasK3', function ($q) {
                return $q->where('users_id', Auth::id());
            })
            ->orderBy('id', 'desc')->get();
        }
        return view('pengadaan.view', compact('pengadaan', 'user', 'unit'));
    }
    
    public function create(Request $r)
    {
        
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
            $p->unit_id = (Auth::user()->status == 'Admin') ? $r->unit_id : Auth::user()->uid;
            if($r->has('khs_pid')){
                $pc = Pengadaan::find($r->khs_pid);
                $p->khs_pid = $r->khs_pid;
                $p->khs_no = $pc->pelaksanaan->nomor_kontrak;
            }
            $p->save();
            
            $direaksi_pk = new DireksiPk();
            $direaksi_pk->pengadaan_id = $p->id;
            $direaksi_pk->users_id = $r->direksi_pk_id;
            $direaksi_pk->save();
            
            if($r->pengawas_pk_id != null){
                $pengawas_pk = new PengawasPk();
                $pengawas_pk->pengadaan_id = $p->id;
                $pengawas_pk->users_id = $r->pengawas_pk_id;
                $pengawas_pk->save();
            }
            
            if($r->pengawas_k3_id != null){
                $pengawas_k3 = new PengawasK3();
                $pengawas_k3->pengadaan_id = $p->id;
                $pengawas_k3->users_id = $r->pengawas_k3_id;
                $pengawas_k3->save();
            }
            
            
            DB::commit();
            return ['res' => 'success', 'id' => $p->id];
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    
    public function update(Request $r)
    {
        DB::beginTransaction();
        try {

            // return $r->all();

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
            if($r->khs_pid != null){
                $pc = Pengadaan::find($r->khs_pid);
                $p->khs_pid = $r->khs_pid;
                $p->khs_no = $pc->pelaksanaan->nomor_kontrak;
            }
            $p->save();
            
            if($p->direksiPk->users_id != $r->direksi_pk_id){
                $direaksi_pk = DireksiPk::find($p->direksiPk->id);
                // $direaksi_pk->pengadaan_id = $p->id;
                $direaksi_pk->users_id = $r->direksi_pk_id;
                $direaksi_pk->save();
            }
            
            if($p->pengawasPk != null && $p->pengawasPk->users_id != $r->pengawas_pk_id){
                $pengawas_pk = PengawasPk::find($p->pengawasPk->id);
                // $pengawas_pk->pengadaan_id = $p->id;
                $pengawas_pk->users_id = $r->pengawas_pk_id;
                $pengawas_pk->save();
            }else{
                if($r->pengawas_pk_id != null){
                    $pengawas_pk = new PengawasPk();
                    $pengawas_pk->pengadaan_id = $p->id;
                    $pengawas_pk->users_id = $r->pengawas_pk_id;
                    $pengawas_pk->save();
                }
            }
            
            if($p->pengawasK3 != null && $p->pengawasK3->users_id != $r->pengawas_k3_id){
                $pengawas_k3 = PengawasK3::find($r->pengawas_k3_id);
                // $pengawas_k3->pengadaan_id = $p->id;
                $pengawas_k3->users_id = $r->pengawas_k3_id;
                $pengawas_k3->save();
            }else{
                if($r->pengawas_k3_id != null){
                    $pengawas_k3 = new PengawasK3();
                    $pengawas_k3->pengadaan_id = $p->id;
                    $pengawas_k3->users_id = $r->pengawas_k3_id;
                    $pengawas_k3->save();
                }
                
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
    
    
    
    public function pengadaanDetail(Request $r)
    {
        $tab = $r->has('tab') ? $r->tab : 'inisiasi';
        
        $pengadaan = Pengadaan::find($r->id);
        $unit = Unit::all();
        $user = User::all();
        $pengadaan_file = PengadaanFile::where('pengadaan_id', $pengadaan->id)->get();
        $mitra = Mitra::all();
        return view('pengadaan.detail', compact('pengadaan', 'pengadaan_file', 'mitra', 'tab', 'unit', 'user'));
    }
    
    
    
    public function pengadaanFileCreate(Request $r)
    {
        // return $r->all();
        DB::beginTransaction();
        try {
            $file_kkp = ($r->hasFile('file_kkp')) ? $r->file('file_kkp') : null;
            $file_tor_kk = ($r->hasFile('file_tor_kk')) ? $r->file('file_tor_kk') : null;
            $file_referensi = ($r->hasFile('file_referensi')) ? $r->file('file_referensi') : null;
            $file_rab_pa = ($r->hasFile('file_rab_pa')) ? $r->file('file_rab_pa') : null;
            $file_justifikasi = ($r->hasFile('file_justifikasi')) ? $r->file('file_justifikasi') : null;
            $file_nota_dinas = ($r->hasFile('file_nota_dinas')) ? $r->file('file_nota_dinas') : null;
            
            $p = Pengadaan::find($r->pengadaan_id);
            
            
            $u = ($p->pengadaanFile == null) ? new PengadaanFile() : PengadaanFile::find($p->pengadaanFile->id);
            if ($file_kkp != null) {
                $u->file_kkp = 'file/' . date('YmdHis') . '-' . $file_kkp->getClientOriginalName();
            }
            if ($file_tor_kk != null) {
                $u->file_tor_kk = 'file/' . date('YmdHis') . '-' . $file_tor_kk->getClientOriginalName();
            }
            if ($file_referensi != null) {
                $u->file_referensi = 'file/' . date('YmdHis') . '-' . $file_referensi->getClientOriginalName();
            }
            if ($file_rab_pa != null) {
                $u->file_rab_pa = 'file/' . date('YmdHis') . '-' . $file_rab_pa->getClientOriginalName();
            }
            if ($file_justifikasi != null) {
                $u->file_justifikasi = 'file/' . date('YmdHis') . '-' . $file_justifikasi->getClientOriginalName();
            }
            if ($file_nota_dinas != null) {
                $u->file_nota_dinas = 'file/' . date('YmdHis') . '-' . $file_nota_dinas->getClientOriginalName();
            }
            
            $u->penlokasi = $r->pengadaan_id;
            $u->save();
            if ($file_kkp != null) {
                $file_kkp->move('file', $u->file_kkp);
            }
            if ($file_tor_kk != null) {
                $file_tor_kk->move('file', $u->file_tor_kk);
            }
            if ($file_referensi != null) {
                $file_referensi->move('file', $u->file_referensi);
            }
            if ($file_rab_pa != null) {
                $file_rab_pa->move('file', $u->file_rab_pa);
            }
            if ($file_justifikasi != null) {
                $file_justifikasi->move('file', $u->file_justifikasi);
            }
            if ($file_nota_dinas != null) {
                $file_nota_dinas->move('file', $u->file_nota_dinas);
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
    
    public function import(Request $r)
    {
        
        $data = Excel::toCollection(new PengadaanImport(), $r->file);
        $rows = $data[0];
        // return $rows;
        
        
        $error_logs = "";
        DB::beginTransaction();
        try {
            foreach ($rows as $row) {
                
                $tanggal_nota_dinas = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_nota_dinas']))->format('Y-m-d');
                $tanggal_kontrak = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_kontrak']))->format('Y-m-d');
                $tanggal_efektif = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_efektif']))->format('Y-m-d');
                $tanggal_akhir = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($row['tanggal_akhir']))->format('Y-m-d');
                
                $ui = User::where('nip', $row['nip'])->first();
                $ud = User::where('nip', $row['nip_direksi'])->first();
                $mitra = Mitra::where('nama', str_replace("\n","",$row['penyedia_barang_jasa']))->first();
                
                if($ui == null){
                    $error_logs = "* Kontrak ".$row['nomor_kontrak']." : NIP User inisiator ".$row['nip']." tidak cocok";
                    return ['res' => 'error', 'msg' => $error_logs];
                }
                
                if($ud == null){
                    $error_logs = "* Kontrak ".$row['nomor_kontrak']." : NIP User Direksi ".$row['nip_direksi']." tidak cocok";
                    return ['res' => 'error', 'msg' => $error_logs];
                }
                
                if($mitra == null){
                    $error_logs = "* Kontrak ".$row['nomor_kontrak']." : Nama Vendor ".$row['penyedia_barang_jasa']." tidak cocok";
                    return ['res' => 'error', 'msg' => $error_logs];
                }
                
                //pengadaan
                $p = new Pengadaan();
                $p->nama = $row['nama_pengadaan'];
                $p->lokasi = $row['lokasi'];
                $p->sumber_anggaran = $row['sumber_anggaran'];
                $p->nilai_anggaran = $row['nilai_anggaran_rab'];
                $p->jenis = $r->jenis;
                $p->volume = $row['vol'];
                $p->metode_pengadaan = $row['metode_pengadaan'];
                $p->no_nota_dinas = $row['nomor_nota_dinas'];
                $p->tgl_nota_dinas = $tanggal_nota_dinas;
                $p->users_id = $ui->id;
                $p->unit_id = $ui->uid;
                $p->submit = 1;
                $p->state = 2;
                $p->save();
                
                $dp = new DireksiPk();
                $dp->pengadaan_id = $p->id;
                $dp->users_id = $ud->id;
                $dp->save();
                
                $pl = new Pelaksanaan();
                $pl->nomor_kontrak = $row['nomor_kontrak'];
                $pl->tgl_kontrak = $tanggal_kontrak;
                $pl->tgl_efektif = $tanggal_efektif;
                $pl->tgl_akhir = $tanggal_akhir;
                $pl->nilai_kontrak = $row['nilai_kontrak'];
                $pl->mitra_id = $mitra->id;
                $pl->pengadaan_id = $p->id;
                $pl->save();
                
            }
       
            if($error_logs == ""){
                DB::commit();
                return ['res' => 'success', 'msg' => 'Import data berhasil !'];
            }else{
                return ['res' => 'error', 'msg' => $error_logs];
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }    
    }
}
