@extends('layouts.app')

@section('header')
    Buat Laporan
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pelaporan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pelaporan.store') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="kecamatan_id" value="{{ Auth::user()->kecamatan_id }}">
                <input type="hidden" name="status" value="proses">
                <div class="form-group">
                    <label for="">Nama Bencana</label>
                    <select name="bencana_id" id="" class="form-control">
                        <option value="">Pilih Bencana...</option>
                        @foreach ($bencanas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_bencana }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="date" name="waktu" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection