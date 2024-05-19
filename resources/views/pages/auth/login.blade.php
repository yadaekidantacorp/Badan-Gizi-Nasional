<?php
use Illuminate\Auth\Events\Login;
use function Livewire\Volt\{rules, state};
use function Laravel\Folio\{middleware, name};

rules([
    'username' => 'required|exists:users,username|regex:/^[a-zA-Z0-9_]+$/',
    'password' => 'required|min:8'
]);
state([
    'username' => '',
    'password' => '',
    'remember' => false
]);
middleware(['guest']);
name('app.login');

$updatedUsername = function () {
    $this->validate([ 
        'username' => 'required|exists:users,username|regex:/^[a-zA-Z0-9_]+$/',
    ]);
};
$updatedPassword = function () {
    $this->validate([
        'password' => 'required|min:8'
    ]);
};
$authenticate = function (){
    $this->validate();
    if (!Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
        sleep(2);
        $this->dispatch('toast-info', message: trans('auth.failed'), title: config('app.name'));
        return;
    }
    $this->dispatch('toast-info', message: 'Welcome back!', title: config('app.name'));
    event(new Login(auth()->guard('web'), \App\Models\User::where('username', $this->username)->first(), $this->remember));
    $route = route('app.dashboard');
    return $this->redirect($route, navigate: true);
};
?>
<title>{{config('app.name')}}: Halaman Masuk</title>
<x-auth-layout>
    @volt
    <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
        <!--begin::Form-->
        <form wire:submit.prevent="authenticate" class="form w-100" novalidate="novalidate">
            <!--begin::Heading-->
            <div class="text-center mb-11">
                <!--begin::Title-->
                <h1 class="text-gray-900 fw-bolder mb-3">Halaman Masuk</h1>
                <!--end::Title-->
                <!--begin::Subtitle-->
                <div class="text-gray-500 fw-semibold fs-6">Lacak Kemajuan Kerja Anda</div>
                <!--end::Subtitle=-->
            </div>
            <!--begin::Heading-->
            <!--begin::Login options-->
            <div class="row g-3 mb-9 d-none">
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Google link=-->
                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/google-icon.svg')}}" class="h-15px me-3" />Sign in with Google</a>
                    <!--end::Google link=-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-md-6">
                    <!--begin::Google link=-->
                    <a href="#" class="btn btn-flex btn-outline btn-text-gray-700 btn-active-color-primary bg-state-light flex-center text-nowrap w-100">
                    <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/apple-black.svg')}}" class="theme-light-show h-15px me-3" />
                    <img alt="Logo" src="{{asset('assets/media/svg/brand-logos/apple-black-dark.svg')}}" class="theme-dark-show h-15px me-3" />Sign in with Apple</a>
                    <!--end::Google link=-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Login options-->
            <!--begin::Separator-->
            <div class="separator separator-content my-14 d-none">
                <span class="w-125px text-gray-500 fw-semibold fs-7">Or with email</span>
            </div>
            <!--end::Separator-->
            <!--begin::Input group=-->
            <div class="fv-row mb-8">
                <!--begin::Email-->
                <x-form.input modifier="blur" id="username" type="text" placeholder="Masukan ID Anda" autocomplete="off" inputStyle="bg-transparent" focus="true" />
                <!--end::Email-->
            </div>
            <!--end::Input group=-->
            <div class="fv-row mb-3">
                <!--begin::Password-->
                <x-form.input modifier="blur" id="password" type="password" placeholder="Masukkan Kata Sandi Anda" autocomplete="off" inputStyle="bg-transparent" />
                <!--end::Password-->
            </div>
            <!--end::Input group=-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div></div>
                <!--begin::Link-->
                {{-- <a href="authentication/layouts/overlay/reset-password.html" class="link-primary">Forgot Password ?</a> --}}
                <!--end::Link-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Submit button-->
            <div class="d-grid mb-10">
                <x-theme.base.button 
                class="btn btn-primary"
                submit="true"
                id="tombol_login"
                indicator="true"
                indicatorProgress="Harap Tunggu..."
                label="Masuk"
                />
            </div>
            <!--end::Submit button-->
            <!--begin::Sign up-->
            <div class="text-gray-500 text-center fw-semibold fs-6 d-none">Not a Member yet? 
            <a href="authentication/layouts/overlay/sign-up.html" class="link-primary">Sign up</a></div>
            <!--end::Sign up-->
        </form>
        <!--end::Form-->
    </div>
    @endvolt
</x-auth-layout>