<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\VPenilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $inisiasi = Pengadaan::where('state', 0)->get();
        $perencana = Pengadaan::where('state', 1)->get();
        $pelaksana = Pengadaan::where('state', 2)->get();
        $kontrak = Pengadaan::where('state', 3)->get();

        $u = Auth::user();

        $chart_data = [];

        if($u->status == 'Admin'){
            $pengadaan = Pengadaan::groupBy('metode_pengadaan')->get();
            foreach ($pengadaan as $peng) {
                $row = Pengadaan::where('metode_pengadaan', $peng->metode_pengadaan)->get();
                array_push($chart_data, array(
                    'kategori' => $peng->metode_pengadaan,
                    'value' => count($row),
                ));
            }
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana'){
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->groupBy('metode_pengadaan')->get();
            foreach ($pengadaan as $peng) {
                $row = Pengadaan::where('unit_id', $u->uid)->where('metode_pengadaan', $peng->metode_pengadaan)->get();
                array_push($chart_data, array(
                    'kategori' => $peng->metode_pengadaan,
                    'value' => count($row),
                ));
            }
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
            })
            ->orderBy('id','desc')->get();
        }



        return view('home', compact('inisiasi','perencana','pelaksana','kontrak','chart_data'));
    }
}
