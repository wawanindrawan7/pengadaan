<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    public function view()
    {
        $mitra = Mitra::all();
        return view('mitra.view', compact('mitra'));
    }

    public function getData()
    {
        $mitra = Mitra::all();
        return compact('mitra');
    }

    public function create(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $u = new Mitra();
            $u->nama = $r->nama;
            $u->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function update(Request $r){
        DB::beginTransaction();
        try {
            $u = Mitra::find($r->id);
            $u->nama = $r->nama;
            $u->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function delete(Request $r)
    {
        DB::beginTransaction();
        try {

            $b = Mitra::find($r->id);
            $b->delete();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
}
