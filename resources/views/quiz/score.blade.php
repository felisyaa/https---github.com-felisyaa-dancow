@extends('layouts.satu.main')
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <div class="mt-5">
            <i class="fa fa-medal" style="font-size: 100px; color: yellow;"></i>
            <h1 style="color: yellow;">Score: {{ $score }}</h1>
            <p>{{ $user->name }}</p>
            <a href="/"><i class="fa fa-home" style="font-size: 50px; color: white;"></i></a>
        </div>
    </div>
</header>
@endsection