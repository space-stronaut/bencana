@extends('layouts.app')

@section('header')
    Create Kategori Bencana
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kategori_bencana.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kategori_bencana.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="kategori_bencana" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection