@props([
    'siswa' => null,
    'mode' => 'create',
    'cancelUrl' => route('admin.siswas.index'),
])

@php
    $isCreate = $mode === 'create';
@endphp

<div class="flex flex-col md:flex-row gap-8 md:gap-12 items-start">
    <div class="w-full md:w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-2">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white pb-1 border-b border-gray-200 dark:border-gray-700">
                    {{ __('Data Siswa') }}
                </h3>
            </div>
            <div>
                <label for="nama" class="form-label">{{ __('Nama') }}</label>
                <input type="text" name="nama" id="nama" required
                    value="{{ old('nama', $siswa?->nama) }}"
                    placeholder="{{ __('Masukkan Nama') }}"
                    class="form-control"
                    autofocus
                />
            </div>
            <div>
                <label for="nis" class="form-label">{{ __('NIS') }}</label>
                <input type="text" name="nis" id="nis" required
                    value="{{ old('nis', $siswa?->nis) }}"
                    placeholder="{{ __('Masukkan NIS') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="kelas" class="form-label">{{ __('Kelas') }}</label>
                <input type="text" name="kelas" id="kelas" required
                    value="{{ old('kelas', $siswa?->kelas) }}"
                    placeholder="{{ __('Masukkan Kelas') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="jurusan" class="form-label">{{ __('Jurusan') }}</label>
                <input type="text" name="jurusan" id="jurusan" required
                    value="{{ old('jurusan', $siswa?->jurusan) }}"
                    placeholder="{{ __('Masukkan Jurusan') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="tanggal_lahir" class="form-label">{{ __('Tanggal Lahir') }}</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                    value="{{ old('tanggal_lahir', $siswa?->tanggal_lahir) }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
                <input type="text" name="alamat" id="alamat" required
                    value="{{ old('alamat', $siswa?->alamat) }}"
                    placeholder="{{ __('Masukkan Alamat') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="no_telepon" class="form-label">{{ __('No Telepon') }}</label>
                <input type="text" name="no_telepon" id="no_telepon" required
                    value="{{ old('no_telepon', $siswa?->no_telepon) }}"
                    placeholder="{{ __('Masukkan No Telepon') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" required
                    value="{{ old('email', $siswa?->email) }}"
                    placeholder="{{ __('Masukkan Email') }}"
                    class="form-control"
                />
            </div>
            <div>
                <label for="jenis_kelamin" class="form-label">{{ __('Jenis Kelamin') }}</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="">-- Pilih --</option>
                    <option value="L" @selected(old('jenis_kelamin', $siswa?->jenis_kelamin) == 'L')>Laki-laki</option>
                    <option value="P" @selected(old('jenis_kelamin', $siswa?->jenis_kelamin) == 'P')>Perempuan</option>
                </select>
            </div>
            <div class="col-span-2 flex mt-4">
                <x-buttons.submit-buttons cancelUrl="{{ $cancelUrl }}" />
            </div>
        </div>
    </div>
</div>
