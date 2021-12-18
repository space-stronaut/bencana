@extends('layouts.app')

@section('header')
    Create Master Bencana
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('bencana.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('bencana.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Bencana</label>
                    <input type="text" name="nama_bencana" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="kategori_bencana_id" id="" class="form-control">
                        <option value="">Pilih Kategori Bencana...</option>
                        @foreach ($kategoris as $item)
                            <option value="{{ $item->id }}">{{ $item->kategori_bencana }}</option>
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