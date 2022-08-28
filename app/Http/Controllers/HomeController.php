<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use App\Models\VPenilaian;
use Illuminate\Http\Request;

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

        $penilaian = VPenilaian::orderBy('nama','asc')->get();

        return view('home', compact('inisiasi','perencana','pelaksana','kontrak','penilaian'));
    }
}
