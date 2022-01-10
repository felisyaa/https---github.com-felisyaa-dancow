<?php $i = 1; ?>
@extends('layouts.dua.main')

@section('content')
@if (session('postBerhasil'))
  <div class="alert alert-success float-middle">
    {{ session('postBerhasil') }}
  </div>
@endif
<a href="/dashboard/posts/create" class="btn btn-success"><i class="fa fa-plus-square"> Buat Post Baru</i></a>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Title</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
                  <a href="/post/{{ $post->slug }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                  <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="post">
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
        <th>Title</th>
        <th>Category</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>

    
@endsection