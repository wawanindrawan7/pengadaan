<?php

namespace App\Http\Controllers;

use App\Imports\ImportMitra;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
            $u->npwp = $r->npwp;
            $u->alamat = $r->alamat;
            $u->kategori = $r->kategori;
            $u->email = $r->email;
            $u->no_wa = $r->no_wa;
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
            $u->npwp = $r->npwp;
            $u->alamat = $r->alamat;
            $u->kategori = $r->kategori;
            $u->email = $r->email;
            $u->no_wa = $r->no_wa;
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

    public function import()
    {
        Excel::import(new ImportMitra(), "data-vendor.xlsx");
        return 'success';
    }
}
