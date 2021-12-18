@extends('layouts.app')

@section('header')
    Pelaporan
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('pelaporan.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            <form action="{{ route('pelaporan.search') }}" method="get"></form>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Pelapor</th>
                        <th scope="col">Nama Bencana</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelaporans as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->user->name}}
                            </td>
                            <td>
                                {{$item->bencana->nama_bencana}}
                            </td>
                            <td>
                                {{$item->waktu}}
                            </td>
                            <td>
                                {{$item->status}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('pelaporan.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('pelaporan.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger mx-2">Hapus</button>
                                </form>
                                <a href="{{ route('pelaporan.show', $item->id) }}" class="btn btn-info">Detail</a>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection