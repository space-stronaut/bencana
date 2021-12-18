@extends('layouts.app')

@section('header')
    Role
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('role.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->nama}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('role.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('role.destroy', $item->id) }}" method="post">
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