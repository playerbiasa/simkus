<?php

namespace App\Imports;

use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DosenImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Dosen([
                'niy' => $row['niy'],
                'nidn' => $row['nidn'],
                'nama' => $row['nama'],
                'jabatan' => $row['jabatan'],
                'prodi_id' => $row['prodi'],
                'password' => Hash::make($row['niy']),
        ]);
    }
}
