@extends('layout.master')

	@section('judul')
    Edit uas
    @endsection

    
@push('script')
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(function(){
        $('#example1').DataTable();
    });
</script>
@endpush

@push('style')
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
@endpush

	@section('content')
    <form method="post" action="/uas/{{ $cast->id }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Npm</label>
            <input type="number" name="npm" value="{{ $cast->npm }}" class="form-control">
</div>
@error('npm')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $cast->nama }}" class="form-control">
</div>
@error('nama')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="bio">{{ $cast->alamat }} </textarea>
</div>
@error('bio')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror

<button type="submit" class="btn btn-primary">Ubah</button>
</form>
@endsection