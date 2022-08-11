<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;

class PenilaianVendorController extends Controller
{
    public function formErrect(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_errect', compact('pengadaan'));
    }
    public function formSupplyOnly(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_only', compact('pengadaan'));
    }
    public function formSupplyErrect(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_supply_errect', compact('pengadaan'));
    }
    public function formKhsDistribusiNiaga(Request $r){
        $pengadaan = Pengadaan::find($r->id);
        return view('penilaian_vendor.form_khs_distribusi_niaga', compact('pengadaan'));
    }
}


