<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportUser implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'nip' => $row['nip'],
            'email' => $row['email'],
            'no_wa' => $row['no_hp'],
            'status' => $row['status'],
            'kategori' => $row['kategori'],
            'uid' => $row['uid'],
            'password' => Hash::make('12345'),
        ]);
    }
}
