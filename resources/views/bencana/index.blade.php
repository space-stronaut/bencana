@extends('layouts.app')

@section('header')
    Master Bencana
@endsection

@section('body')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('bencana.create') }}" class="btn btn-primary">Create</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bencanas as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                {{$item->nama_bencana}}
                            </td>
                            <td>
                                {{$item->category->kategori_bencana}}
                            </td>
                            <td class="d-flex">
                                <a href="{{ route('bencana.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('bencana.destroy', $item->id) }}" method="post">
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