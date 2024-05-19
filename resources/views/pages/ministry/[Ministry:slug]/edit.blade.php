<?php
use App\Models\Ministry;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{computed, mount, rules, state, usesFileUploads};

usesFileUploads();
middleware(['auth']);
name('app.ministry.edit');

state(['ministry' => fn () => $ministry]);
state(['nama' => '','thumbnail' => '']);
rules([
    'nama' => 'required|unique:ministries,name',
    'thumbnail' => 'required'
]);
$updatedNama = function () {
    $this->validate([
        'nama' => 'required|unique:ministries,name'
    ]);
};
$save = function () {
    $this->validate();
    if($this->thumbnail){
        if($this->ministry->thumbnail != null){
            Storage::delete($this->ministry->thumbnail);
        }
        $thumbnail = $this->thumbnail->store('ministry', 'public');
    }
    $this->ministry->castAndUpdate([
        'name' => $this->nama,
        'slug' => Str::slug($this->nama),
        'thumbnail' => $thumbnail ?? $this->ministry->thumbnail
    ]);
    $this->dispatch('toast-success', message: 'Kementerian / Lembaga berhasil disimpan', title: config('app.name'));
    return $this->redirect(route('app.ministry.index'), navigate: true);
};
mount(function(){
    $this->nama = $this->ministry->name;
});
?>
<title>{{config('app.name')}}: Tambah Kementerian / Lembaga</title>
<x-app-layout>
    <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Kementerian / Lembaga</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('app.dashboard') }}" wire:navigate class="text-muted text-hover-primary">Dasbor</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Master</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Kementerian / Lembaga</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Tambah Data</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('app.ministry.index') }}" wire:navigate class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    @volt
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <h3 class="card-label">
                            Form Tambah Data Kementerian / Lembaga
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <x-form.form function="save">
                        @include('pages.ministry.form')
                        <div class="d-flex justify-content-end">
                            <div class="d-grid">
                                <x-theme.base.button 
                                class="btn btn-sm btn-primary"
                                submit="true"
                                id="tombol_simpan"
                                indicator="true"
                                indicatorProgress="Harap Tunggu..."
                                label="Simpan"
                                />
                            </div>
                        </div>
                    </x-form.form>
                </div>
            </div>
        </div>
    </div>
    @endvolt
</x-app-layout>