<?php
use App\Models\Ministry;
use function Laravel\Folio\{middleware, name};
use function Livewire\Volt\{computed, mount, state, usesPagination};

middleware(['auth']);
name('app.ministry.index');

usesPagination(theme: 'bootstrap');
state(['search','layout','order'])->url();
$collection=computed(function(){
    $ministry = Ministry::where('name', 'like', '%'.$this->search.'%');
    if($this->order == 2){
        $ministry->orderBy('name', 'desc');
    }elseif($this->order == 1){
        $ministry->orderBy('name', 'asc');
    }else{
        $ministry->orderBy('name', 'asc');
    }
    if($this->layout == 'grid'){
        return $ministry->paginate(9);
    }elseif($this->layout == 'list'){
        return $ministry->paginate(10);
    }else{
        return $ministry->paginate(9);
    }
});
?>
<title>{{config('app.name')}}: Kementerian / Lembaga</title>
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
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <a href="{{ route('app.ministry.create') }}" wire:navigate class="btn btn-flex btn-outline btn-color-gray-700 btn-active-color-primary bg-body h-40px fs-7 fw-bold">Tambah Kementerian / Lembaga</a>
                </div>
            </div>
        </div>
    </div>
    @volt
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <form>
                <div class="card mb-7">
                    @include('pages.ministry.filter')
                </div>
            </form>
            @if($this->layout == 'grid' || !$this->layout)
            <div class="row g-6 g-xl-9 mb-5">
                @foreach($this->collection as $item)
                @php
                $proker = random_int(1, 9);
                $pekerjaan = random_int(1, 9);
                $persentase = $proker > 0 ? ($pekerjaan / $pekerjaan) * 100 : 0;
                $progress = random_int(1, 99);
                @endphp
                <div class="col-md-6 col-xl-4">
                    <a href="{{ route('app.ministry.show',['ministry' => $item->slug]) }}" wire:navigate class="card border-hover-primary">
                        <div class="card-header border-0 pt-9">
                            <div class="card-title m-0">
                                <div class="symbol symbol-50px w-50px bg-light">
                                    <img src="{{ $item->image }}" alt="image" class="p-3" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <span class="badge badge-light-primary fw-bold me-auto px-4 py-3"></span>
                            </div>
                        </div>
                        <div class="card-body p-9">
                            <div class="fs-3 fw-bold text-gray-900 mb-7">{{ $item->name }}</div>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bold">{{ $proker }}</div>
                                    <div class="fw-semibold text-gray-500">Total Proker</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bold">{{ $pekerjaan }}</div>
                                    <div class="fw-semibold text-gray-500">Total Pekerjaan</div>
                                </div>
                            </div>
                            <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" title="{{ $item->name }} telah menyelesaikan {{ $progress }}% Pekerjaan dari {{ $proker }} Program Kerja">
                                <div class="bg-primary rounded h-4px" role="progressbar" style="width: {{ $progress }}%" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="symbol-group symbol-hover">
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Emma Smith">
                                    <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Rudy Stone">
                                    <img alt="Pic" src="assets/media/avatars/300-1.jpg" />
                                </div>
                                <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="Susan Redwood">
                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            {{$this->collection->links()}}
            @elseif($this->layout == 'list')
            <div class="card">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <h3>List Kementerian / Lembaga</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="ministry_table">
                        <thead>
                            <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                <th class="w-10px pe-2">
                                    <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                        <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#ministry_table .form-check-input" value="1" />
                                    </div>
                                </th>
                                <th class="min-w-125px">Nama</th>
                                <th class="min-w-125px">Tanggal Dibuat</th>
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
                                <td class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                        <a href="{{ route('app.ministry.show', ['ministry' => $item->slug]) }}">
                                            <div class="symbol-label">
                                                <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-100" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="{{ route('app.ministry.show', ['ministry' => $item->slug]) }}" class="text-gray-800 text-hover-primary mb-1">{{ $item->name }}</a>
                                    </div>
                                </td>
                                <td>{{ $item->created_at->format('d M Y, H:i a') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('app.ministry.show', ['ministry' => $item->slug]) }}" wire:navigate class="btn btn-icon btn-primary">
                                        <i class="ki-outline ki-magnifier"></i>
                                    </a>
                                    <a href="#" class="btn btn-icon btn-danger">
                                        <i class="ki-outline ki-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$this->collection->links()}}
                </div>
            </div>
            @endif
        </div>
    </div>
    @endvolt
</x-app-layout>