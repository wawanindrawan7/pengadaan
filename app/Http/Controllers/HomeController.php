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
        

        $sangat_baik = 0;
        $baik = 0;
        $cukup = 0;
        $buruk = 0;
        // $belum_dinilai = 0;

        if($u->status == 'Admin'){
            $pengadaan = Pengadaan::groupBy('metode_pengadaan')->get();
            foreach ($pengadaan as $peng) {
                $row = Pengadaan::where('metode_pengadaan', $peng->metode_pengadaan)->get();
                foreach ($row as $rw) {
                    if($rw->pelaksanaan != null && $rw->pelaksanaan->penilaianVendor != null){ 
                        if($rw->pelaksanaan->penilaianVendor->kategori == 'Sangat Baik'){
                            $sangat_baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Baik'){
                            $baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Cukup'){
                            $cukup ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Buruk'){
                            $buruk ++;
                        }
                    }else{
                        // $belum_dinilai ++;
                    }
                }
                array_push($chart_data, array(
                    'kategori' => $peng->metode_pengadaan,
                    'value' => count($row),
                ));
            }
        }elseif($u->kategori == 'Perencana' || $u->kategori == 'Pelaksana' || $u->kategori == 'Admin Unit'){
            $pengadaan = Pengadaan::where('unit_id', $u->uid)->groupBy('metode_pengadaan')->get();
            foreach ($pengadaan as $peng) {
                $row = Pengadaan::where('unit_id', $u->uid)->where('metode_pengadaan', $peng->metode_pengadaan)->get();
                foreach ($row as $rw) {
                    if($rw->pelaksanaan != null && $rw->pelaksanaan->penilaianVendor != null){
                        if($rw->pelaksanaan->penilaianVendor->kategori == 'Sangat Baik'){
                            $sangat_baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Baik'){
                            $baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Cukup'){
                            $cukup ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Buruk'){
                            $buruk ++;
                        }
                    }else{
                        // $belum_dinilai ++;
                    }
                }
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

            foreach ($pengadaan as $peng) {
                $row = Pengadaan::where('unit_id', $u->uid)->where('metode_pengadaan', $peng->metode_pengadaan)->get();
                foreach ($row as $rw) {
                    if($rw->pelaksanaan != null && $rw->pelaksanaan->penialaianVendor != null){
                        if($rw->pelaksanaan->penilaianVendor->kategori == 'Sangat Baik'){
                            $sangat_baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Baik'){
                            $baik ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Cukup'){
                            $cukup ++;
                        }elseif($rw->pelaksanaan->penilaianVendor->kategori == 'Buruk'){
                            $buruk ++;
                        }
                    }else{
                        // $belum_dinilai ++;
                    }
                }
                array_push($chart_data, array(
                    'kategori' => $peng->metode_pengadaan,
                    'value' => count($row),
                ));
            }
            
        }

        $chart_penilaian_data = [
            // ['kategori' => 'Sangat Baik', 'value' => $sangat_baik],
            ['kategori' => 'Baik', 'value' => $baik],
            ['kategori' => 'Cukup', 'value' => $cukup],
            ['kategori' => 'Buruk', 'value' => $buruk],
            // ['kategori' => 'Belum Dinilai', 'value' => $belum_dinilai],
        ];

        // return $chart_penilaian_data;




        return view('home', compact('inisiasi','perencana','pelaksana','kontrak','chart_data','chart_penilaian_data'));
    }
}
