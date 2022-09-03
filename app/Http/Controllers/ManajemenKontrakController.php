<?php

namespace App\Http\Controllers;

use App\Models\Pengadaan;
use Illuminate\Http\Request;

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
}
