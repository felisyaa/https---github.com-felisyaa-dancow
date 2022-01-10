@extends('layouts.dua.main')
@section('content')

    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            {{-- <h3><i class="fa fa-cubes"></i> {{ $stok }}</h3>
            <p>Jumlah Stok</p> --}}
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/toko/stok" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            {{-- <h3><i class="fa fa-spa"></i> {{ $plant }}</h3>
            <p>Jumlah Tanaman</p> --}}
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/toko/tanaman" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-secondary">
          <div class="inner">
            {{-- <h3><i class="fa fa-tools"></i> {{ $item }}</h3>
            <p>Jumlah Item</p> --}}
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="/toko/item" class="small-box-footer">Lihat <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>

@endsection