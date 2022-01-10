@extends('layouts.dua.main')
@section('content')
    <div class="row">
        <div class="col-10 offset-1 bg-white rounded py-3 d-flex justify-content-center">
            <form action="/dashboard/posts" method="post" style="width: 700px;">
              @csrf
                <div class="mb-3">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                  @error('title')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug">
                  @error('slug')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <label class="input-group-text" for="category">Category</label>
                  <select class="form-select  @error('category_id') is-invalid @enderror" id="category" name="category_id">
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="mb-3">
                  @error('body')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                  @enderror
                  <input id="x" type="hidden" name="body">
                  <trix-editor input="x"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </form>
        </div>
    </div>

<script>
  title.addEventListener('change', function() {
        fetch('/dashboard/posts/createSlug?title=' + title.value)
          .then(response => response.json())
          .then(data => slug.value = data.slug)
      });

      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      });
</script>
@endsection