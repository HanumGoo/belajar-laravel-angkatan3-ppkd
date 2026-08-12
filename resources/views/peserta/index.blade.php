@extends('app')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{ route('peserta-create') }}" class="btn btn-primary">Tambah Peserta</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>umur</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $index => $value)
                <tr>
                    <td>{{ $index += 1 }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->age }}</td>
                    <td>delete</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
