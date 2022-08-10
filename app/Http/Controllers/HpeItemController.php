<?php

namespace App\Http\Controllers;

use App\Models\HpeItemTemp;
use Illuminate\Http\Request;

class HpeItemController extends Controller
{
    //

    public function loadItem(Request $r)
    {
        $item = HpeItemTemp::where('pengadaan_id', $r->pengadaan_id)->get();
        return compact('item');
    }

    public function addItem(Request $r)
    {
        $item = new HpeItemTemp();
        $item->pengadaan_id = $r->pengadaan_id;
        $item->item = $r->item;
        $item->satuan = $r->satuan;
        $item->vol_1 = $r->vol_1;
        $item->vol_2 = $r->vol_2;
        $item->harga_satuan = $r->harga_satuan;
        $item->jumlah = ($item->vol_1 + $item->vol_2) * $item->harga_satuan;
        $item->save();

        return 'success';

    }

    public function deleteItem(Request $r)
    {
        $item = HpeItemTemp::find($r->id);
        $item->delete();
        return 'success';
    }
}
