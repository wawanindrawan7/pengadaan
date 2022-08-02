<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // public function __construct()
    // {
    //     return $this->middleware('auth');
    // }

    public function view(){
        $user = User::all();
        return view('user.view', compact('user'));
    }

    public function create(Request $r){
        DB::beginTransaction();
        try {
            $u = new User();
            $u->name = $r->name;
            $u->email = $r->email;
            $u->password = Hash::make($r->password);
            $u->save();
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
}
