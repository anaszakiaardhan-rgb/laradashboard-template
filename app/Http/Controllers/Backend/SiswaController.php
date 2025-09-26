<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Siswa\StoreSiswaRequest;
use App\Http\Requests\Siswa\UpdateSiswaRequest;
use App\Models\Siswa;
use App\Services\SiswaService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
	public function __construct(
		private readonly SiswaService $siswaService,
	) {
	}

	public function index(): Renderable
	{
		$this->authorize('viewAny', Siswa::class);
		$this->setBreadcrumbTitle(__('Siswa'));
		return $this->renderViewWithBreadcrumbs('backend.pages.siswas.index');
	}

	public function create(): Renderable
	{
		$this->authorize('create', Siswa::class);
		$this->setBreadcrumbTitle(__('Tambah Siswa'))
			->addBreadcrumbItem(__('Siswa'), route('admin.siswas.index'));
		return $this->renderViewWithBreadcrumbs('backend.pages.siswas.create');
	}

	public function store(StoreSiswaRequest $request): RedirectResponse
	{
		$this->authorize('create', Siswa::class);
		$data = $request->validated();
		$this->siswaService->createSiswa($data);
		session()->flash('success', __('Siswa berhasil ditambahkan.'));
		return redirect()->route('admin.siswas.index');
	}

	public function edit(int $id): Renderable
	{
		$siswa = Siswa::findOrFail($id);
		$this->authorize('update', $siswa);
		$this->setBreadcrumbTitle(__('Edit Siswa'))
			->addBreadcrumbItem(__('Siswa'), route('admin.siswas.index'));
		return $this->renderViewWithBreadcrumbs('backend.pages.siswas.edit', [
			'siswa' => $siswa,
		]);
	}

	public function update(UpdateSiswaRequest $request, int $id): RedirectResponse
	{
		$siswa = Siswa::findOrFail($id);
		$this->authorize('update', $siswa);
		$data = $request->validated();
		$this->siswaService->updateSiswa($siswa, $data);
		session()->flash('success', __('Siswa berhasil diupdate.'));
		return back();
	}

	public function destroy(int $id): RedirectResponse
	{
		$siswa = Siswa::findOrFail($id);
		$this->authorize('delete', $siswa);
		$this->siswaService->deleteSiswa($siswa);
		session()->flash('success', __('Siswa berhasil dihapus.'));
		return back();
	}

	public function bulkDelete(Request $request): RedirectResponse
	{
		$this->authorize('bulkDelete', Siswa::class);
		$ids = $request->input('ids', []);
		if (empty($ids)) {
			return redirect()->route('admin.siswas.index')
				->with('error', __('Tidak ada siswa yang dipilih untuk dihapus.'));
		}
		$deletedCount = $this->siswaService->bulkDeleteSiswas($ids);
		if ($deletedCount > 0) {
			session()->flash('success', __(':count siswa berhasil dihapus', ['count' => $deletedCount]));
		} else {
			session()->flash('error', __('Tidak ada siswa yang dihapus.'));    
		}
		return redirect()->route('admin.siswas.index');
	}
}
