<?php

namespace App\Imports;

use App\Models\Mitra;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportMitra implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mitra([
            'nama' => $row['nama'],
            'kategori' => $row['kategori'],
            'npwp' => $row['npwp'],
            'no_wa' => $row['no_whatsapp'],
            'alamat' => $row['alamat'],
        ]);
    }
}
