@extends('templates.default')

@php
    $title = 'Authors_id';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('authors_id.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>name</th>
            <th>slug</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($authors as $author)
             <tr>
                <td>{{$author->id }}</td>
                <td>
                  <a href="{{ route('authors_id.show', $author)}}">{{$author->name}}</a>
                </td>
                <td>{{$author->slug}}</td>
                <td>
                <a href="{{ route('authors_id.edit', $author->id)}}">Edit</a>
                <form action="{{ route('authors_id.destroy', $author->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input type="submit" value="Hapus" class="btn btn-danger">
                </form>
                </td>
             </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection