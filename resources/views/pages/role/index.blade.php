<?php
use App\Models\Role;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{computed, state, usesPagination};

middleware(['auth']);
name('app.role.index');

usesPagination(theme: 'bootstrap');
state(['search','layout','order'])->url();
$collection=computed(function(){
    $role = Role::where('name', 'like', '%'.$this->search.'%');
    if(Auth::user()->role_id == 2){
        $role->where('id', '>', 1);
    }elseif(Auth::user()->role_id == 3){
        $role->where('id', '>', 2);
    }elseif(Auth::user()->role_id == 4){
        $role->where('id', '>', 3);
    }
    if($this->order == 2){
        $role->orderBy('id', 'desc');
    }elseif($this->order == 1){
        $role->orderBy('id', 'asc');
    }else{
        $role->orderBy('id', 'asc');
    }
    return $role->paginate(10);
});
?>
<title>{{config('app.name')}}: Peran Pengguna</title>
<x-app-layout>
    <div id="kt_app_toolbar" class="app-toolbar pt-2 pt-lg-10">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">Peran Pengguna</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('app.dashboard') }}" wire:navigate class="text-muted text-hover-primary">Dasbor</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Manajemen Pengguna</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Peran Pengguna</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('app.role.create') }}" wire:navigate class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Tambah Data Peran Pengguna</a>
                </div>
            </div>
        </div>
    </div>
    @volt
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="card mb-7">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
                            <input type="text" wire:model.live="search" class="form-control form-control-solid w-250px ps-13" placeholder="Cari">
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            <div class="d-flex flex-wrap my-1">
                                <div class="d-flex my-0">
                                    <select name="order" wire:model.live="order" class="form-select form-select-sm border-body bg-body w-250px me-5">
                                        <option value="1">Urutkan berdasarkan Menaik (A-Z)</option>
                                        <option value="2">Urutkan berdasarkan Menurun (Z-A)</option>
                                    </select>
                                    <select name="status" data-control="select2" data-hide-search="true" data-placeholder="Export" class="form-select form-select-sm border-body bg-body w-100px d-none">
                                        <option value="1">Excel</option>
                                        <option value="1">PDF</option>
                                        <option value="2">Print</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="directorate_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#directorate_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Nama</th>
                                <th class="min-w-125px">Total Pengguna</th>
                                <th class="text-end min-w-70px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="fw-semibold text-gray-600">
                            @foreach($this->collection as $item)
                            <tr>
                                <td>
                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" value="1" />
                                    </div>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td> {{ $item->users->count() }} </td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Aksi 
                                    <i class="ki-outline ki-down fs-5 ms-1"></i></a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                        <div class="menu-item px-3">
                                            <a href="apps/user-management/users/view.html" class="menu-link px-3">Lihat</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$this->collection->links()}}
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->
    @endvolt
</x-app-layout>