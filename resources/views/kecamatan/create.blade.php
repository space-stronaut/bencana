@extends('layouts.app')

@section('header')
    Create Kecamatan
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kecamatan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kecamatan.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Kecamatan</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kota</label>
                    <select name="kota_id" id="" class="form-control">
                        <option value="">Pilih Kota</option>
                        @foreach ($kotas as $item)
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