@extends('layouts.app')

@section('header')
    Edit Kategori Bencana
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kategori_bencana.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_bencana.update', $kategori->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="kategori_bencana" value="{{ $kategori->kategori_bencana }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection