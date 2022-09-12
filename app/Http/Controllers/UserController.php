<?php

namespace App\Http\Controllers;

use App\Imports\ImportUser;
use App\Models\Unit;
use App\Models\User;
use App\Models\UsersUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }

    public function view(){
        $user = User::all();
        $unit = Unit::all();
        return view('user.view', compact('user','unit'));
    }

    public function create(Request $r){
        DB::beginTransaction();
        try {
            $u = new User();
            $u->name = $r->name;
            $u->nip = $r->nip;
            $u->no_wa = $r->no_wa;
            $u->status = $r->status;
            $u->email = $r->email;
            $u->password = Hash::make($r->password);
            $u->save();

            $uu = new UsersUnit();
            $uu->users_id = $u->id;
            $uu->unit_id = $r->unit_id;
            $uu->save();
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
            $u = User::find($r->id);
            $u->name = $r->name;
            $u->nip = $r->nip;
            $u->no_wa = $r->no_wa;
            $u->status = $r->status;
            $u->email = $r->email;
            $u->password = Hash::make($r->password);
            $u->save();

            if($u->usersUnit == null){
                $uu = new UsersUnit();
            }else{
                $uu = UsersUnit::find($u->usersUnit->id);
            }
            $uu->unit_id = $r->unit_id;
            $uu->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }

    public function createUnit(Request $r){
        DB::beginTransaction();
        try {
            $uu = new UsersUnit();
            $uu->users_id = $r->users_id;
            $uu->unit_id = $r->unit_id;
            $uu->save();
            DB::commit();
            return 'success';
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th->getMessage();
        }
    }
    public function updateUnit(Request $r){
        DB::beginTransaction();
        try {
            $uu = UsersUnit::find($r->id);
            $uu->unit_id = $r->unit_id;
            $uu->save();
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
            $p = User::find($r->id);
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
        // Excel::import(new ImportUser(), "user.xlsx");
        // return 'success';
        $user = User::all();
        foreach ($user as $u) {
            if($u->uid != null){
                $uu = new UsersUnit();
                $uu->users_id = $u->id;
                $uu->unit_id = $u->uid;
                $uu->save();
            }


        }
        return 'success';
    }


}
