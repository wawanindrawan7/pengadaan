<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function view()
    {
        $unit = Unit::all();
        return view('unit.view', compact('unit'));
    }

    public function create(Request $r){
        // return $r->all();
        DB::beginTransaction();
        try {
            $u = new Unit();
            $u->nama = $r->nama;
            $u->kota = $r->kota;
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
            $u = Unit::find($r->id);
            $u->nama = $r->nama;
            $u->kota = $r->kota;
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

            $b = Unit::find($r->id);
            $b->delete();

            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

}
