@extends('layouts.satu.main')
@section('content')
<header class="masthead bg-primary text-white text-center">
  <form action="/quiz3/{{ auth()->user()->username }}" method="post" id="myForm">
  @csrf
  </form>
  <input type="hidden" id="jumlah" value="{{ $materis->count() }}">
    <div class="container d-flex align-items-center flex-column">
        @if (session('loginBerhasil'))
        <div class="row">
            <div class="col">
            </div>
        </div>
        @endif
        <div>Timer</div>
        <span id="time">06:00</span>
        <div class="row d-flex justify-content-center">
            <div class="col-12 border border-3 rounded" style="width: 800px; height: 500px;">
                <div id="myCarousel" class="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <button type="button" class="btn btn-success" style="margin-top: 210px; font-size: 50px;" data-bs-target="#myCarousel" data-bs-slide="next" onclick="mulai()">Mulai</button>
                      </div>
                      @for ($i = 0; $i < $materis->count(); $i++)
                      <div class="carousel-item mt-3">
                        <img class="mt-3" src="asset/{{ $materis[$i]->image }}" style="width: 250px; height: 250px;">
                        <div>{{ $materis[$i]->soal }}</div>
                        <div class="d-flex justify-content-between mt-5">
                          <div class="form-check">
                            <input form="myForm" class="form-check-input" type="radio" name="no{{ $materis[$i]->no }}[{{ $materis[$i]->no }}]" id="a{{ $materis[$i]->no }}" value="a">
                            <label class="form-check-label" for="a{{ $materis[$i]->no }}">
                              A. {{ $materis[$i]->a }}
                            </label>
                          </div>

                          <div class="form-check">
                            <input form="myForm" class="form-check-input" type="radio" name="no{{ $materis[$i]->no }}[{{ $materis[$i]->no }}]" id="b{{ $materis[$i]->no }}" value="b">
                            <label class="form-check-label" for="b{{ $materis[$i]->no }}">
                              B. {{ $materis[$i]->b }}
                            </label>
                          </div>

                          <div class="form-check">
                            <input form="myForm" class="form-check-input" type="radio" name="no{{ $materis[$i]->no }}[{{ $materis[$i]->no }}]" id="c{{ $materis[$i]->no }}" value="c">
                            <label class="form-check-label" for="c{{ $materis[$i]->no }}">
                              C. {{ $materis[$i]->c }}
                            </label>
                          </div>

                          <div class="form-check">
                            <input form="myForm" class="form-check-input" type="radio" name="no{{ $materis[$i]->no }}[{{ $materis[$i]->no }}]" id="d{{ $materis[$i]->no }}" value="d">
                            <label class="form-check-label" for="d{{ $materis[$i]->no }}">
                              D. {{ $materis[$i]->d }}
                            </label>
                          </div>

                        </div>
                      </div>
                      @endfor
                      <div class="carousel-item">
                        <button type="submit" form="myForm" class="btn btn-success" style="margin-top: 210px; font-size: 50px;">Kirim</button>
                      </div>
                    </div>
                    <button style="width: 50px; height: 40px;" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev" onclick="mulai()">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button style="width: 50px; height: 40px;" class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next" onclick="mulai()">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
        </div>
    </div>
</header>
<script>
let start = false;
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
            myForm.submit();
        }
    }, 1000);
}

const mulai = function() {
  if(!start) {
    start = true;
    startTimer(359, time);
  }
}
</script>
@endsection