@extends('layouts.satu.main')
@section('content')
<title>{{ $title ?? '' }}</title>

<header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <div class="row d-flex justify-content-center"> <h1>PERATURAN</h1> <br>
            <div class="col-12 border border-3 rounded" style="width: 1500px; height: 400px;">
                <div class="bg-light rounded d-flex justify-content-evenly" style="width: 90%; height:250px; margin-left: 5%;margin-top: 5%;">
                    <div class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 110px; width: 300px;font-size: large;">
                        <font color="black">
                            Setiap quiz, hanya akan di berikan 6 menit untuk mengerjakan.
                            <br> 
                            Lebih dari 6 menit, soal akan otomatis tutup dan skor akan tersimpan.
                        </font>
                    </div>
                        <div class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 110px; width: 300px;font-size: large;">
                            <font color="black">
                                <br>
                                Dianjurkan untuk membaca materi di halaman <a href="/penjelasanmateri" style="color: rgb(0, 140, 255);">Materi</a> terlebih dahulu
                            </font>
                        </div>
                         <div class="mt-5 rounded" style="background-color: rgb(184, 183, 183); height: 110px; width: 300px;font-size: large;">
                                <font color="black">
                                    <br>
                                    Kerjakan dengan sebaik-baiknya
                                </font>
                            </div>
                    </a>
                </div>
            </div>
        </div>
    </header>
    @endsection