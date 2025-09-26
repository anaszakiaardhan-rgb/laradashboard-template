<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Siswa;

class SiswaService
{
    public function createSiswa(array $data): Siswa
    {
        return Siswa::create($data);
    }

    public function updateSiswa(Siswa $siswa, array $data): Siswa
    {
        $siswa->update($data);
        return $siswa;
    }

    public function deleteSiswa(Siswa $siswa): void
    {
        $siswa->delete();
    }

    public function bulkDeleteSiswas(array $ids): int
    {
        return Siswa::whereIn('id', $ids)->delete();
    }
}
