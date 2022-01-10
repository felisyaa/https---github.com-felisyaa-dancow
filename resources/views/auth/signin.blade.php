@extends('layouts.satu.main')

@section('content')

<div class="container-fluid py-5 d-flex justify-content-center" style="background-color: #1abc9c;">
  <div class="row" style="padding-top: 100px;">
    <div class="col text-center" style="width: 400px;">
      @if (session('loginGagal'))
        <div class="row">
            <div class="col">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginGagal') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
      @elseif (session('registrasiBerhasil'))
        <div class="row">
            <div class="col">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('registrasiBerhasil') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
        @endif
      <p class="badge fs-3" style="background-color: #2c3e50;">Please Sign In</p>
      <form action="/signin" method="post">
        @csrf
        <div class="form-floating">
          <input class="form-control rounded-top @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username" required>
          <label for="username">Username</label>
          @error('username')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input class="form-control rounded-bottom @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required>
          <label for="Password">password</label>
          @error('password')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
          @enderror
        </div>
        <p>Dont have an account?<a href="/signup" style="color: #2c3e50;"> Sign Up</a></p>
        <button class="badge fs-3 mt-3" type="submit" style="background-color: #2c3e50;"><i class="fa fa-sign-in-alt"></i> Sign In</button>
      </form>
    </div>
  </div>
        
</div>
@endsection