@extends('layouts.dua.main')
@section('content')
<div class="row">
    <div class="col-10 offset-1 bg-white rounded py-3 d-flex justify-content-center">
        <form action="/dashboard/admin" method="post" style="width: 700px;" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="foto">Foto</label><br>
            <input class="border" type="file" name="image" id="image" style="width: 460px; height: 200px;">
              <p class="">Drop file gambar di dalam atau abaikan</p>
            @error('foto')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
            @enderror
          </div>
            <div class="mb-3">
              <label for="name" class="form-label">Nama</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
              @error('name')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}">
              @error('username')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
              @error('email')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="number" class="form-label">Nomer</label>
              <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') }}">
              @error('number')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">
              @error('password')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="authorization">Authorisasi</label>
                <select class="form-select @error('authorization') is-invalid @enderror" id="category" name="authorization">
                    <option value="3" @if (old('authorization') === 3) selected @endif>Member</option>
                    <option value="2" @if (old('authorization') === 2) selected @endif>Moderator</option>
                    <option value="1" @if (old('authorization') === 1) selected @endif>Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary float-right">Tambahkan</button>
          </form>
    </div>
</div>
@endsection