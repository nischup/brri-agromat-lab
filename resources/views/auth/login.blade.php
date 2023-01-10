@extends('layouts.guest')
@section('title', __('User Login'))
@section('breadcrumb')
    {{ Breadcrumbs::render('login') }}
@endsection
@section('content')

<section class="account-section padding-bottom">
        <div class="container">
            <div class="account-wrapper mt-lg--440">
                <div class="left-side" style="padding-top: 10px">
                       {{-- <img src="{{ asset('images/bd-logo.png') }}"> --}}
                    <div class="section-header">
                     
                        <h2 class="title" style="font-size:23px;">{{ __('গনপ্রজাতন্ত্রী বাাংলাদেশ সরকার') }}</h2>
                        <p>কৃষি মন্ত্রনালয় <br> বাাংলাদেশ ধান গবেষণা ইনিস্টিটিউট <br> এগ্রোমেট ল্যাব</p>
                        
                    </div>
                    @livewire('user-login')
                </div>
                <div class="right-side">
                    <div class="section-header mb-0">
                        <img src="{{ asset('images/brri-logo.jpg') }}" alt="brri-logo">
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
