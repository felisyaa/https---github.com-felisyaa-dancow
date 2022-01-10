@extends('layouts.satu.main')

@section('content')

<style>
  .alert-danger {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
  }
</style>

<div class="container-fluid py-5 d-flex justify-content-center" style="background-color: #1abc9c;">
  <div class="row" style="padding-top: 100px;">
    <div class="col text-center" style="width: 400px;">
      <p class="badge fs-3" style="background-color: #2c3e50;">Please Sign Up</p>
      <form action="/signup" method="post">
        @csrf
        <div class="form-floating">
          <input class="form-control rounded-top @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name" required>
          <label for="name">Name</label>
          @error('name')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input class="form-control @error('name') is-invalid @enderror" type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Username" required>
          <label for="username">Username</label>
          @error('username')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input class="form-control @error('name') is-invalid @enderror" type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
          <label for="email">Email (optional)</label>
          @error('email')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input class="form-control @error('name') is-invalid @enderror" type="text" name="number" id="number" value="{{ old('number') }}" placeholder="Number">
          <label for="number">Number (optional)</label>
          @error('number')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <div class="form-floating">
          <input class="form-control rounded-bottom @error('name') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password" required>
          <label for="Password">password</label>
          @error('password')
              <div class="alert alert-danger">
                  {{ $message }}
              </div>
          @enderror
        </div>
        <p>Already have an account?<a href="/signin" style="color: #2c3e50;"> Sign In</a></p>
        <button class="badge fs-3 mt-3" type="submit" style="background-color: #2c3e50;"><i class="fa fa-user-plus"></i> Sign Up</button>
      </form>
    </div>
  </div>
        
</div>
<style>
</style>
@endsection