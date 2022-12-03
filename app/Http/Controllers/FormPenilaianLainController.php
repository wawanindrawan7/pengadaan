<?php

namespace App\Http\Controllers;

use App\Models\FormLainTemp;
use App\Models\FormPenilaianLain;
use App\Models\Pelaksanaan;
use App\Models\PenilaianVendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormPenilaianLainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function form(Request $r){
        $pel = Pelaksanaan::find($r->id);
        return view('penilaian_vendor.form_lain', compact('pel'));
    }

    public function loadTemp(Request $r)
    {
        $temp = FormLainTemp::where('pelaksanaan_id', $r->id)->get();
        $total = $temp->sum('nilai');
        if ($total >= 80) {
            $kategori = 'Baik';
        } else if ($total >= 60 && $total < 80) {
            $kategori = 'Cukup';
        } else {
            $kategori = 'Buruk';
        }
        return compact('temp','total','kategori');
    }

    public function addItem(Request $r)
    {
        // return $r->all();
        if($r->mode == 'add'){
            $temp = FormLainTemp::where('pelaksanaan_id', $r->id)->sum('nilai');
    
            if(($temp + $r->nilai) > 100){
                return 'error';
            }
    
            // return $r->all();
            $n = new FormLainTemp();
            $n->pelaksanaan_id = $r->id;
            $n->kriteria = $r->kriteria;
            $n->nilai = $r->nilai;
            $n->save();
    
            return 'success';
        }else{
            $n = FormLainTemp::find($r->tid);
            
            $temp = FormLainTemp::where('pelaksanaan_id', $r->id)->sum('nilai');
            if(($temp - $n->nilai + $r->nilai) > 100){
                return 'error';
            }
    
            // return $r->all();
            $n->kriteria = $r->kriteria;
            $n->nilai = $r->nilai;
            $n->save();

            return 'success';
        }
    }

    public function delItem(Request $r)
    {
        $n = FormLainTemp::find($r->id);
        $n->delete();
        return 'success';
    }

    public function create(Request $r)
    {
        DB::beginTransaction();
        try {
            
            $p = new PenilaianVendor();
            $p->form = 'lain';
            $p->total = $r->total;
            $p->pelaksanaan_id = $r->pelaksanaan_id;
            $p->kategori = $r->kategori;
            $p->dpt_non_dpt = $r->dpt_non_dpt;
            $p->tgl_penilaian = $r->tgl_penilaian;
            $p->ket = $r->ket;
            $p->save();

            $temp = FormLainTemp::where('pelaksanaan_id', $p->pelaksanaan_id)->get();

            foreach($temp as $t){
                $fp = new FormPenilaianLain();
                $fp->kriteria = $t->kriteria;
                $fp->nilai = $t->nilai;
                $fp->penilaian_vendor_id = $p->id;
                $fp->save();
            }

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
