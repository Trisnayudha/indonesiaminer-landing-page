@extends('template.index-home')
@section('title', 'Indonesia Miner : HOME')
@section('header-bg', 'bg-light')

@section('content')
    {{-- Navbar tetap --}}
    @include('home.navbar')

    {{-- Hero (lazy) --}}
    <section id="#home">
        <div class="lazy-section" data-url="{{ route('section.partial', 'jarallax') }}">
            <div class="lazy-placeholder" style="height:60vh;"></div>
        </div>
    </section>

    {{-- Marquee --}}
    <div>
        <div class="lazy-section" data-url="{{ route('section.partial', 'marque') }}">
            <div class="lazy-placeholder" style="height:3rem;"></div>
        </div>
    </div>

    {{-- Changing Days --}}
    <section class="py-5 bg-light">
        <div class="lazy-section" data-url="{{ route('section.partial', 'changing') }}">
            <div class="lazy-placeholder" style="height:300px;"></div>
        </div>
    </section>

    {{-- Exhibitors --}}
    <section id="exhibition-page" class="py-5 bg-white">
        <div class="lazy-section" data-url="{{ route('section.partial', 'video') }}">
            <div class="lazy-placeholder" style="height:400px;"></div>
        </div>
    </section>

    {{-- Speakers --}}
    <section id="speakers" class="py-5 bg-light">
        <div class="lazy-section" data-url="{{ route('section.partial', 'speakers') }}">
            <div class="lazy-placeholder" style="height:600px;"></div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="py-5 bg-white">
        <div class="lazy-section" data-url="{{ route('section.partial', 'faq') }}">
            <div class="lazy-placeholder" style="height:500px;"></div>
        </div>
    </section>

    {{-- Photo gallery --}}
    <section id="photo-gallery" class="py-5 bg-light">
        <div class="lazy-section" data-url="{{ route('section.partial', 'photo') }}">
            <div class="lazy-placeholder" style="height:400px;"></div>
        </div>
    </section>

    {{-- FACE OF … --}}
    <section id="foim" class="py-5 bg-white">
        <div class="lazy-section" data-url="{{ route('section.partial', 'foim') }}">
            <div class="lazy-placeholder" style="height:500px;"></div>
        </div>
    </section>

    {{-- Miners Talk --}}
    <section id="minerstalk" class="py-5 bg-white">
        <div class="lazy-section" data-url="{{ route('section.partial', 'minerstalk') }}">
            <div class="lazy-placeholder" style="height:600px;"></div>
        </div>
    </section>

    {{-- Subscribe news --}}
    <section id="subscribe" class="py-5 bg-light">
        <div class="lazy-section" data-url="{{ route('section.partial', 'subscribenews') }}">
            <div class="lazy-placeholder" style="height:300px;"></div>
        </div>
    </section>

    {{-- Sticky bottom countdown --}}
    <div class="sticky-bottom-bar d-flex align-items-center justify-content-center px-3 gap-3">
        @include('home.section.countdown')
    </div>

@endsection
