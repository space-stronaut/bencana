@extends('layouts.app')

@section('header')
    Kategori Bencana
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('kategori_bencana.create') }}" class="btn btn-primary">Create</a>
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
                    @forelse ($kategoris as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->kategori_bencana}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('kategori_bencana.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('kategori_bencana.destroy', $item->id) }}" method="post">
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