<?php $i = 1; ?>
@extends('layouts.dua.main')

@section('content')
@if (session('buatBerhasil'))
<div class="alert alert-success">
  {{ session('buatBerhasil') }}
</div>
@elseif (session('hapusBerhasil'))
<div class="alert alert-danger">
  {{ session('hapusBerhasil') }}
</div>
@elseif (session('ubahBerhasil'))
<div class="alert alert-warning">
  {{ session('ubahBerhasil') }}
</div>
@endif
<a href="/dashboard/admin/create" class="btn btn-success float-left"><i class="fa fa-plus-square"> Buat User Baru</i></a>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Authorisasi</th>
        <th>Nama</th>
        <th>Username</th>
        <th>Email</th>
        <th>Nomer</th>
        <th>Foto</th>
        <th>Password</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $user->authorization }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->number }}</td>
              <td>{{ $user->foto }}</td>
              <td>{{ $user->password }}</td>
              <td>
                <a href="/dashboard/admin/{{ $user->username }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                <form class="d-inline" action="/dashboard/admin/{{ $user->username }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Post?')"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Authorisasi</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Nomer</th>
            <th>Foto</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
    </tfoot>
  </table>

    
@endsection