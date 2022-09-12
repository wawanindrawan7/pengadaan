<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManajemenKontrakController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function view(Request $r)
    {
        $pengadaan = Pengadaan::where('state', '>=', 3)->get();
        return view('manajemen-kontrak.view', compact('pengadaan'));
    }

    public function rekap(Request $r)
    {
        $unit = Unit::all();

        $u = Auth::user();
        if($u->status == 'Admin'){
            $pengadaan = Pengadaan::orderBy('id','desc')->get();
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana'){
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }else{
            $pengadaan = Pengadaan::where('users_id', $u->id)
            ->orWhereHas('direksiPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasPk', function($q){
                return $q->where('users_id', Auth::id());
            })
            ->orWhereHas('pengawasK3', function($q){
                return $q->where('users_id', Auth::id());
            })->whereHas('pelaksanaan')->orderBy('id','desc')->get();
        }
        return view('pengadaan.kontrak-rekap', compact('pengadaan','unit'));
    }
}
