@extends('layouts.dua.main')
@section('content')
<div class="row">
  <div class="col-12">
    @if (session('passwordBerhasil'))
        <div class="alert alert-success">
          {{ session('passwordBerhasil') }}
        </div>
    @elseif (session('passwordSalah'))
        <div class="alert alert-danger">
          {{ session('passwordSalah') }}
        </div>
    @elseif (session('nomerBerhasil'))
      <div class="alert alert-success">
        {{ session('nomerBerhasil') }}
      </div>
    @elseif (session('fotoBerhasil'))
      <div class="alert alert-success">
        {{ session('fotoBerhasil') }}
      </div>
    @elseif (session('namaBerhasil'))
      <div class="alert alert-success">
        {{ session('namaBerhasil') }}
      </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  </div>
</div>
    <div class="row bg-white">
      <div class="col-5 offset-1 d-flex justify-content-center py-3">
        <img class="border" src="{{ asset('/storage/'. auth()->user()->foto) }}" alt="Foto User" style="width: 200px; height: 200px;">
        <div class="position-absolute">
          <button class=="btn btn-outline-secondary" data-toggle="modal" data-target="#staticBackdrop3"><i class="fa fa-edit"></i></button>
        </div>
      </div>
        <div class="col-5 d-flex justify-content-center py-3">
            <table>
                <tr>
                  <td><p style="font-size: 25px;">Nama</p></td>    
                  <td>
                      <div class="input-group mb-3">:&nbsp;
                          <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                          <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#staticBackdrop4">Ubah</button>
                      </div>
                  </td>
                </tr> 
                <tr>
                  <td><p style="font-size: 25px;">Username</p></td>    
                  <td>
                      <div class="input-group mb-3">:&nbsp;
                          <input type="text" class="form-control" value="{{ auth()->user()->username }}" readonly>  
                      </div>
                  </td>
                </tr> 
                <tr>
                    <td><p style="font-size: 25px;">Email</p></td>    
                    <td>
                        <div class="input-group mb-3">:&nbsp;
                            <input type="text" class="form-control" value="{{ auth()->user()->email }}" readonly>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <td><p style="font-size: 25px;">Nomor Telepon</p></td>    
                    <td>
                        <div class="input-group mb-3">:&nbsp;
                            <input type="numeric" class="form-control" value="{{ auth()->user()->number }}" readonly>
                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#staticBackdrop2">Ubah</button>
                        </div>
                    </td>
                </tr>    
                <tr>
                    <td><p style="font-size: 25px;">Password</p></td>    
                    <td>
                        <div class="input-group mb-3">:&nbsp;
                            <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#staticBackdrop">Ubah</button>
                        </div>
                    </td>
                </tr>    
            </table> 
        </div>
    </div>

    <!-- Modal Ubah Password -->
<form action="/dashboard/user/{{ auth()->user()->username }}/password" method="post">
@csrf
@method('put')
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-label-group mb-1">
                <label for="passwordLama">Password Lama</label>
                <input type="password" id="passwordLama" name="passwordLama" class="form-control" placeholder="Password Lama">
              </div>
            <div class="form-label-group">
                <label for="password">Password Baru</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password Baru">
              </div>
            <div class="form-label-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
              </div>
        </div>
        <div class="modal-footer bg-secondary">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!-- Modal Ubah Password -->
<!-- Modal Ubah Nomer -->
<form action="/dashboard/user/{{ auth()->user()->username }}/number" method="post">
@csrf
@method('put')
<div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-label-group mb-1">
                <label for="number">Nomor Telepon Baru</label>
                <input type="text" id="number" name="number" class="form-control" placeholder="Nomer baru">
            </div>
        </div>
        <div class="modal-footer bg-secondary">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
      </div>
    </div>
  </div>
</form>
    <!-- Modal Ubah Nomer -->
    <!-- Modal Ubah Foto -->

  <div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body align-middle">
            <form action="/dashboard/user/{{ auth()->user()->username }}/foto" method="post" id="imageForm" enctype="multipart/form-data">
              @csrf
              @method('put')
              <input class="border" type="file" name="image" id="image" style="width: 460px; height: 200px;">
              <p class="">Drop & Drag Image Inside</p>
            </form>
          </div>
          <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="uploadImage" class="btn btn-primary" form="imageForm">Ubah</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Ubah Foto -->
    <!-- Modal Ubah Nama -->

  <div class="modal fade" id="staticBackdrop4" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-secondary">
            <h5 class="modal-title" id="staticBackdropLabel">Ubah Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body align-middle">
            <form action="/dashboard/user/{{ auth()->user()->username }}/name" method="post" id="nameForm" enctype="multipart/form-data">
              @csrf
              @method('put')
              <div class="form-label-group mb-1">
                <label for="name">Nama Baru</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Nama baru">
              </div>
            </form>
          </div>
          <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="uploadImage" class="btn btn-primary" form="nameForm">Ubah</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal Ubah Nama -->
@endsection