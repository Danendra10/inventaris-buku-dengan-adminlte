@extends('adminlte::page')
@section('title', 'Book edit')
@section('content_header')
    <h1 class="m-0 text-dark">Book edit</h1>
@stop
@section('content')
    <form action="{{route('books.update', $books)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama lengkap" name="name" value="{{$books->name ?? old('name')}}">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="noBuku">No Buku</label>
                        <input type="text" class="form-control" id="noBuku" placeholder="Masukkan no" name="no" value="{{$books->no ?? old('no')}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('books.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop