@extends('layouts.app')

@section('header')
    Edit User
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $user->id) }}" method="post">
                @csrf
@method('PUT')
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" value="{{ $user->tgl_lahir }}" id="" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Role</label>
                    <select name="role_id" id="" class="form-control">
                        <option value="">Pilih Role...</option>
                        @foreach ($roles as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $user->role_id ? 'selected' : '' }}>{{ $item->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Kecamatan</label>
                    <select name="kecamatan_id" id="" class="form-control">
                        <option value="">Pilih Kecamatan...</option>
                        @foreach ($kecamatans as $item)
                            <option value="{{ $item->id }}" {{ $item->id == $user->kecamatan_id ? 'selected' : '' }}>{{ $item->nama }}</option>
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
