@extends('layouts.satu.main')
@section('content')
<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        @if (session('loginBerhasil'))
        <div class="row">
            <div class="col">
            </div>
        </div>
        @endif
        <div class="row d-flex justify-content-center">
            <div class="col-12 border border-3 rounded" style="width: 1500px; height: 550px;">
                <div style="font-size: 60px;"><i class="fa fa-globe-asia"></i></div>
                <br>
                @if (auth()->user())
                    <h3>Selamat Datang  {{ auth()->user()->name }}</h3>  
                @else
                    <h3>Silahkan Login Terlebih Dahulu</h3> <a href="/signin" style="color: white;">Klik Disini</a>
                @endif
                <div class="bg-light rounded d-flex justify-content-evenly" style="width: 90%; height:300px; margin-left: 5%;">
                    <a href="penjelasanmateri" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 200px; width: 180px;">
                        <br>
                        <font color="black">
                            <i class="fas fa-book-open" style="font-size: 100px;"></i><br><br>
                            Materi
                        </font>
                    </a>
                    <a href="/quiz" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 200px; width: 180px;">
                        <br>
                        <font color="black">
                            <i class="fa fa-question-circle" style="font-size: 100px;"></i><br><br>
                            Quiz
                        </font>
                    </a>
                    <a href="/dashboard/user" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 200px;width: 180px;">
                        <br>
                        <font color="black">
                            <i class="fa fa-user-circle" style="font-size: 100px;"></i><br><br>
                            Info Akun
                        </font>
                    </a>
                    <a href="/lb" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 200px;width: 180px;">
                        <br>
                        <font color="black">
                            <i class="fa fa-trophy" style="font-size: 100px;"></i><br><br>
                            Leaderboard
                        </font>
                    </a>
                    <a href="peraturan" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 200px; width: 150px;width: 180px;">
                        <br>
                        <font color="black">
                            <i class="fas fa-book" style="font-size: 100px;"></i><br><br>
                            Peraturan
                        </font>
                    </a>
                </div>
        </div>
    </div>
</header>
@endsection