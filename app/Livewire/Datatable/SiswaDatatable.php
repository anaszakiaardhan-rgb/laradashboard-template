<?php

namespace App\Livewire\Datatable;

use App\Models\Siswa;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueryBuilder\QueryBuilder;


class SiswaDatatable extends Datatable
{
    public string $model = Siswa::class;
    public array $disabledRoutes = ['view'];

    protected function getHeaders(): array
    {
        return [
            [
                'id' => 'nama',
                'title' => __('Nama'),
                'sortable' => true,
                'sortBy' => 'nama',
            ],
            [
                'id' => 'nis',
                'title' => __('NIS'),
                'sortable' => true,
                'sortBy' => 'nis',
            ],
            [
                'id' => 'kelas',
                'title' => __('Kelas'),
                'sortable' => true,
                'sortBy' => 'kelas',
            ],
            [
                'id' => 'alamat',
                'title' => __('Alamat'),
                'sortable' => false,
            ],
            [
                'id' => 'actions',
                'title' => __('Actions'),
                'is_action' => true,
            ],
        ];
    }

    protected function buildQuery(): QueryBuilder
    {
        $query = QueryBuilder::for($this->model)
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('nama', 'like', "%{$this->search}%")
                        ->orWhere('nis', 'like', "%{$this->search}%");
                });
            });
        return $this->sortQuery($query);
    }

    public function renderNamaColumn(Siswa $siswa): Renderable
    {
        return view('backend.pages.siswas.partials.siswa-nama', compact('siswa'));
    }

    public function renderActionsColumn($item): Renderable|string
    {
        return view('backend.pages.siswas.partials.siswa-actions', ['siswa' => $item]);
    }

    protected function handleBulkDelete(array $ids): int
    {
        $siswas = Siswa::whereIn('id', $ids)->get();
        $deletedCount = 0;
        foreach ($siswas as $siswa) {
            $this->authorize('delete', $siswa);
            $siswa->delete();
            $deletedCount++;
        }
        return $deletedCount;
    }

    public function handleRowDelete(Model|Siswa $siswa): bool
    {
        $this->authorize('delete', $siswa);
        return $siswa->delete();
    }
}
