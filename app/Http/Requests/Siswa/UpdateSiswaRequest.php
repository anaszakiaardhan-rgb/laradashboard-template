<?php

declare(strict_types=1);

namespace App\Http\Requests\Siswa;

use App\Http\Requests\FormRequest;

class UpdateSiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $siswaId = $this->route('siswa');
        return [
            'nama' => 'required|max:100',
            'nis' => 'required|unique:siswas,nis,' . $siswaId,
            'kelas' => 'required|max:50',
            'jurusan' => 'required|max:100',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|max:255',
            'no_telepon' => 'required|max:20',
            'email' => 'required|email|unique:siswas,email,' . $siswaId,
            'jenis_kelamin' => 'required|in:L,P',
        ];
    }
}
