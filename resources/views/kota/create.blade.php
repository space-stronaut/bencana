@extends('layouts.app')

@section('header')
    Create Kota
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kota.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kota.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kota</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Provinsi</label>
                    <select name="provinsi_id" id="" class="form-control">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinsis as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection