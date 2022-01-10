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
            <div class="col-12 border border-3 rounded" style="width: 800px; height: 500px;">
                <span style="font-size: 60px;"><i class="fa fa-globe-asia"></i></span>
                <p>Pilih Materi</p>
                <div class="bg-light rounded d-flex justify-content-evenly" style="width: 90%; height:300px; margin-left: 5%;">
                    <a href="/materi1" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 180px;">
                        <img src="/asset/number/1.png" style="width: 130px; height: 130px;"><br><br>
                        <font color="black">Materi 1</font>
                    </a>
                    <a href="/materi2" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 180px;">
                        <img src="/asset/number/2.png" style="width: 130px; height: 130px;"><br><br>
                        <font color="black">Materi 2</font>
                    </a>
                    <a href="/materi3" class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 180px;">
                        <img src="/asset/number/3.png" style="width: 130px; height: 130px;"><br><br>
                        <font color="black">Materi 3</font>
                    </a>
                </div>
        </div>
    </div>
</header>
@endsection