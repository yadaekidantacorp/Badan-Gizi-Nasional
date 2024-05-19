<?php
use App\Models\Ministry;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{computed, state, usesPagination};

state(['ministry' => fn () => $ministry]);
middleware(['auth']);
name('app.ministry.document');
?>
<title>{{config('app.name')}}: Dokumen {{ $ministry->name }}</title>
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
                        <li class="breadcrumb-item text-muted">{{ $ministry->name }}</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Dokumen</li>
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
            <div class="card mb-6 mb-xl-9">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-6">
                        <div class="d-flex flex-center flex-shrink-0 bg-light rounded w-100px h-100px w-lg-150px h-lg-150px me-7 mb-4">
                            <img class="mw-50px mw-lg-75px" src="{{ $this->ministry->image }}" alt="image" />
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-1">
                                        <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bold me-3">{{ $this->ministry->name }}</a>
                                        <span class="badge badge-light-success me-auto">In Progress</span>
                                    </div>
                                    {{-- <div class="d-flex flex-wrap fw-semibold mb-4 fs-5 text-gray-500">#1 Tool to get started with Web Apps any Kind & size</div> --}}
                                </div>
                                <div class="d-flex mb-4">
                                    <a href="#" class="btn btn-sm btn-bg-light btn-active-color-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Tambah Program Kerja</a>
                                    <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">Tambah Pekerjaan</a>
                                    <div class="me-0">
                                        <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                            <i class="ki-solid ki-dots-horizontal fs-2x"></i>
                                        </button>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Lainnya</div>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Tambah Direktorat</a>
                                            </div>
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3">Tambah Pengguna</a>
                                            </div>
                                            {{-- <div class="menu-item px-3">
                                                <a href="#" class="menu-link flex-stack px-3">Create Payment 
                                                <span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
                                                    <i class="ki-outline ki-information fs-6"></i>
                                                </span></a>
                                            </div> --}}
                                            <div class="menu-item px-3 my-1">
                                                <a href="#" class="menu-link px-3">Export PDF</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-start">
                                <div class="d-flex flex-wrap">
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="fs-4 fw-bold">29 Jan, 2024</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Due Date</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-arrow-down fs-3 text-danger me-2"></i>
                                            <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="75">0</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Open Tasks</div>
                                    </div>
                                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                                        <div class="d-flex align-items-center">
                                            <i class="ki-outline ki-arrow-up fs-3 text-success me-2"></i>
                                            <div class="fs-4 fw-bold" data-kt-countup="true" data-kt-countup-value="15000" data-kt-countup-prefix="$">0</div>
                                        </div>
                                        <div class="fw-semibold fs-6 text-gray-500">Budget Spent</div>
                                    </div>
                                </div>
                                <div class="symbol-group symbol-hover mb-3">
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Alan Warden">
                                        <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michael Eberon">
                                        <img alt="Pic" src="assets/media/avatars/300-11.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Michelle Swanston">
                                        <img alt="Pic" src="assets/media/avatars/300-7.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Francis Mitcham">
                                        <img alt="Pic" src="assets/media/avatars/300-20.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                        <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Melody Macy">
                                        <img alt="Pic" src="assets/media/avatars/300-2.jpg" />
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Perry Matthew">
                                        <span class="symbol-label bg-info text-inverse-info fw-bold">P</span>
                                    </div>
                                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Barry Walter">
                                        <img alt="Pic" src="assets/media/avatars/300-12.jpg" />
                                    </div>
                                    <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                        <span class="symbol-label bg-dark text-inverse-dark fs-8 fw-bold" data-bs-toggle="tooltip" data-bs-trigger="hover" title="View more users">+42</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="separator"></div>
                    <x-menu.ministry :ministry="$this->ministry" />
                </div>
            </div>
            <div class="d-flex flex-wrap flex-stack my-5">
                <h3 class="fw-bold my-2">Dokumen 
                <span class="fs-6 text-gray-500 fw-semibold ms-1">+590</span></h3>
                <div class="d-flex my-2">
                    <div class="d-flex align-items-center position-relative me-4">
                        <i class="ki-outline ki-magnifier fs-3 position-absolute translate-middle-y top-50 ms-4"></i>
                        <input type="text" id="kt_filter_search" class="form-control form-control-sm form-control-solid bg-body fw-semibold fs-7 w-150px ps-11" placeholder="Cari" />
                    </div>
                    {{-- <a href="apps/file-manager/folders.html" class='btn btn-primary btn-sm fw-bolder'>File Manager</a> --}}
                </div>
            </div>
            <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/pdf.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/pdf-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">Project Reqs..</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">3 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/doc.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/doc-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">CRM App Docs..</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">3 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/css.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/css-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">User CRUD Styles</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">4 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/ai.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/ai-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">Product Logo</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">5 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/sql.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/sql-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">Orders backup</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">1 week ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/xml.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/xml-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">UTAIR CRM API Co..</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">2 weeks ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100">
                        <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                            <a href="apps/file-manager/files.html" class="text-gray-800 text-hover-primary d-flex flex-column">
                                <div class="symbol symbol-60px mb-5">
                                    <img src="{{asset('assets/media/svg/files/tif.svg')}}" class="theme-light-show" alt="" />
                                    <img src="{{asset('assets/media/svg/files/tif-dark.svg')}}" class="theme-dark-show" alt="" />
                                </div>
                                <div class="fs-5 fw-bold mb-2">Tower Hill App..</div>
                            </a>
                            <div class="fs-7 fw-semibold text-gray-500">3 weeks ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 flex-center bg-light-primary border-primary border border-dashed p-8">
                        <img src="{{asset('assets/media/svg/files/upload.svg')}}" class="mb-5" alt="" />
                        <div class="form-group">
                            <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                <div class="dropzone-panel mb-4">
                                    <a class="dropzone-select btn btn-sm btn-primary me-2">Unggah Dokumen</a>
                                    <a class="dropzone-upload btn btn-sm btn-light-primary me-2">Unggah Semua</a>
                                    <a class="dropzone-remove-all btn btn-sm btn-light-primary">Hapus Semua</a>
                                </div>
                                <div class="dropzone-items wm-200px">
                                    <div class="dropzone-item p-5" style="display:none">
                                        <div class="dropzone-file">
                                            <div class="dropzone-filename text-gray-900" title="some_image_file_name.jpg">
                                                <span data-dz-name="">some_image_file_name.jpg</span>
                                                <strong>(
                                                <span data-dz-size="">340kb</span>)</strong>
                                            </div>
                                            <div class="dropzone-error mt-0" data-dz-errormessage=""></div>
                                        </div>
                                        <div class="dropzone-progress">
                                            <div class="progress bg-gray-300">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                            </div>
                                        </div>
                                        <div class="dropzone-toolbar">
                                            <span class="dropzone-start">
                                                <i class="ki-outline ki-to-right fs-1"></i>
                                            </span>
                                            <span class="dropzone-cancel" data-dz-remove="" style="display: none;">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                            <span class="dropzone-delete" data-dz-remove="">
                                                <i class="ki-outline ki-cross fs-2"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fs-7 fw-semibold text-gray-500">Ukuran file maksimum adalah 1MB per file.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endvolt
</x-app-layout>