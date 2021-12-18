@extends('layouts.app')

@section('header')
    User
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Kecamatan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->name}}
                            </td>
                            <td class="text-uppercase">
                                {{$item->role->nama}}
                            </td>
                            <td>
                                {{$item->kecamatan->nama}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-2">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection