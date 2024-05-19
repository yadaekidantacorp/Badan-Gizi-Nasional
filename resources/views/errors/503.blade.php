<title>500</title>
<x-error-layout>
    @volt
    <div class="d-flex flex-column flex-center text-center p-10">
        <!--begin::Wrapper-->
        <div class="card card-flush w-lg-650px py-5">
            <div class="card-body py-15 py-lg-20">
                <!--begin::Title-->
                <h1 class="fw-bolder fs-2hx text-gray-900 mb-4">Oops!</h1>
                <!--end::Title-->
                <!--begin::Text-->
                <div class="fw-semibold fs-6 text-gray-500 mb-7">Service Unavailable</div>
                <!--end::Text-->
                <!--begin::Illustration-->
                <div class="mb-3">
                    <img src="{{asset('assets/media/auth/500-error.png')}}" class="mw-100 mh-300px theme-light-show" alt="" />
                    <img src="{{asset('assets/media/auth/500-error-dark.png')}}" class="mw-100 mh-300px theme-dark-show" alt="" />
                </div>
                <!--end::Illustration-->
                <!--begin::Link-->
                <div class="mb-0">
                    <a href="{{ route('app.dashboard') }}" wire:navigate class="btn btn-sm btn-primary">Return Dashboard</a>
                </div>
                <!--end::Link-->
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    @endvolt
</x-error-layout>