<?php $i = 1; ?>
@extends('layouts.dua.main')

@section('content')
@if (session('soalBerhasil'))
  <div class="alert alert-success">
    {{ session('soalBerhasil') }}
  </div>
@elseif (session('ubahBerhasil'))
  <div class="alert alert-warning">
    {{ session('ubahBerhasil') }}
  </div>
@elseif (session('hapusBerhasil'))
  <div class="alert alert-danger">
    {{ session('hapusBerhasil') }}
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
@can('isModOrHigher', auth()->user())
  <button class="btn btn-success float-left" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus-square"></i> Buat soal Baru</button>
@endcan
  <table id="example1" class="table table-bordered table-striped" width="100%">
    <thead>
      <tr>
        <th>No</th>
        <th>Soal</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>Benar</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($materis as $m)
            <tr>
              <td>{{ $m->no }}</td>
              <td>{{ $m->soal }}</td>
              <td>{{ $m->a }}</td>
              <td>{{ $m->b }}</td>
              <td>{{ $m->c }}</td>
              <td>{{ $m->d }}</td>
              <td>{{ $m->benar }}</td>
              <td>{{ $m->image }}</td>
              <td>
                <div class="d-inline">
                  <form action="/m3" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{ $m->id }}">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Hapus Soal?')"><i class="fa fa-trash"></i></button>
                  </form>
                  <button onclick="edit('{{$m->no}}','{{ $m->soal }}','{{ $m->a }}','{{ $m->b }}','{{ $m->c }}','{{ $m->d }}','{{ $m->benar }}','{{ $m->id }}')" class="btn btn-success" data-toggle="modal" data-target="#staticBackdropEdit"><i class="fa fa-edit"></i></button>
                </div>
                </td>
        @endforeach
    </tbody>
    <tfoot>
      <tr>
        <th>No</th>
        <th>Soal</th>
        <th>A</th>
        <th>B</th>
        <th>C</th>
        <th>D</th>
        <th>Benar</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>

<!-- Add Item Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="staticBackdropLabel">Buat Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/m3" method="post" id="addForm" enctype="multipart/form-data">
          @csrf
          <input type="file" class="border" name="image" style="width: 450px; height: 100px;">
          <small id="imageLabel" class="form-text text-muted">*seret foto ke dalam kotak</small>
          <div class="form-group">
            <label for="no">No</label>
            <input type="text" class="form-control" name="no">
          </div>
          <div class="form-group">
            <label for="soal">Soal</label>
            <input type="text" class="form-control" name="soal">
          </div>
          <div class="form-group">
            <label for="a">A</label>
            <input type="text" class="form-control" name="a">
            <label for="b">B</label>
            <input type="text" class="form-control" name="b">
            <label for="c">C</label>
            <input type="text" class="form-control" name="c">
            <label for="d">D</label>
            <input type="text" class="form-control" name="d">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="benar">Jawaban Benar</label>
            <select class="form-select" name="benar">
              <option selected>Choose...</option>
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
            </select>
          </div>
        </div>
      </form>
        <div class="modal-footer bg-secondary">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" form="addForm">Buat</button>
      </div>
    </div>
  </div>
</div>
<!-- end Add Item Modal -->

<!-- Edit Plant Modal -->
<div class="modal fade" id="staticBackdropEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-secondary">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Soal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/m3" method="post" id="editForm" enctype="multipart/form-data">
          @csrf
          @method('put')
          <input type="file" class="border" name="image" id="image" style="width: 450px; height: 100px;">
          <small id="imageLabel" class="form-text text-muted">*seret foto ke dalam kotak</small>
          <input type="hidden" class="form-control" name="id" id="id">
          <div class="form-group">
            <label for="no">No</label>
            <input type="text" class="form-control" name="no" id="no">
          </div>
          <div class="form-group">
            <label for="soal">Soal</label>
            <input type="text" class="form-control" name="soal" id="soal">
          </div>
          <div class="form-group">
            <label for="a">A</label>
            <input type="text" class="form-control" name="a" id="a">
            <label for="b">B</label>
            <input type="text" class="form-control" name="b" id="b">
            <label for="c">C</label>
            <input type="text" class="form-control" name="c" id="c">
            <label for="d">D</label>
            <input type="text" class="form-control" name="d" id="d">
          </div>
          <div class="input-group mb-3">
            <label class="input-group-text" for="benar">Jawaban Benar</label>
            <select class="form-select" name="benar" id="benar">
              <option selected value="">Choose...</option>
              <option value="a">A</option>
              <option value="b">B</option>
              <option value="c">C</option>
              <option value="d">D</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer bg-secondary">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" form="editForm">edit</button>
      </div>
    </div>
  </div>
</div>
<!-- end Edit Plant Modal -->

<script>
  function edit(noI, soalI, aI, bI, cI, dI, benarI, idI) {
    console.log(no);  
    no.value = noI;
    soal.value = soalI;
    a.value = aI;
    b.value = bI;
    c.value = cI;
    d.value = dI;
    id.value = idI;
    benar.value = benarI;
  }
</script>
@endsection