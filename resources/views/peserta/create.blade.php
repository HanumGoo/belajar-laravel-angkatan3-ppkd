@extends('app')
@section('content')
    <form action="{{ route('peserta-store') }}" method="post">
        
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
    </form>
@endsection
