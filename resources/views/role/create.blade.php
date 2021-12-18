@extends('layouts.app')

@section('header')
    Create Role
@endsection
@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('role.index') }}" class="btn btn-primary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Nama Role</label>
                    <input type="text" name="nama" id="" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection