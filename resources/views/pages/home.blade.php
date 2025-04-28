@extends('layout.app')

@section('title', 'Home')
@section('page_title', 'Selamat datang di Berita Batam')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Selamat Pagi</h1>
    <p class="mb-4">Berikut adalah berita update di hari ini</p>

    <div class="flex gap-8">
    @include('components.card', [
        'imgsrc' => 'images/mobil1.jpg',
        'title' => 'Mobil Balap',
        'desc' => 'Salah Satu Mobil Paling Laju dan Keren Di Indonesia'
    ])
    
    @include('components.card', [
        'imgsrc' => 'images/mobil2.jpg',
        'title' => 'Mobil Balap',
        'desc' => 'Salah Satu Mobil Paling Laju dan Keren Di Indonesia'
    ])
    </div>
@endsection
