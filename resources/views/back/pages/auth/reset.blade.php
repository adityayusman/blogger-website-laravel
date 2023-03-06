@extends('back.layouts.auth-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Reset Password')

@section('content')
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ \App\Models\Setting::find(1)->blog_logo }}" height="36"
                        alt=""></a>
            </div>
            @livewire('author-reset-form')
            <div class="text-center text-muted mt-3">
                Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
            </div>
        </div>
    </div>
@endsection