@extends('layouts.app')

@section('header')
    Edit Kecamatan
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kecamatan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('kecamatan.update', $kecamatan->id) }}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="">Nama Kota</label>
                    <input type="text" name="nama" value="{{ $kecamatan->nama }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kota</label>
                    <select name="kota_id" id="" class="form-control">
                        <option value="">Pilih Kota</option>
                        @foreach ($kotas as $item)
                            <option value="{{ $item->id }}" {{ $kecamatan->kota_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
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