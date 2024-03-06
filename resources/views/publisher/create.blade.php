@extends('templates.default')

@php
    $title = 'Publisher';
    $preTitle = 'Tambah Data';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('publisher.store')}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control 
                @error('name')
                    is-invalid
                @enderror"
                placeholder="Tuliskan Nama">
                @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="address" class="form-control 
                @error('address')
                    is-invalid
                @enderror"
                placeholder="Tuliskan Alamat">
                @error('address')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="nb-3">
                <input type="submit" value="Simpan" class="submit btn btn-primary">
              </div>
        </form>
    </div>
</div>
@endsection