@extends('layouts.app')

@section('header')
    Create Provinsi
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('provinsi.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('provinsi.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Provinsi</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection