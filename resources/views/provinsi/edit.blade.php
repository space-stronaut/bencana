@extends('layouts.app')

@section('header')
    Edit Provinsi
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('provinsi.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('provinsi.update', $provinsi->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Provinsi</label>
                    <input type="text" name="nama" value="{{ $provinsi->nama }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection