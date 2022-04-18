@extends('layouts.main')
@section('content')
<form action="{{ url('admin/keluhan/'.$keluhan->id) }}" method="POST">
    @method('patch')
    @csrf
    <div class="form-group">
        <label>User</label>
        <input type="text" name="user_id" class="form-control @error('user_id') is-invalid @enderror" value="{{ old('user_id', $keluhan->user_id) }}" disabled>
        @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
     <div class="form-group">
        <label>Keluhan</label>
        <input type="text" name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" value="{{ old('keluhan', $keluhan->keluhan) }}" autofocus >
        @error('keluhan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label>Status</label>
        <select name="status" class="form-control" value="{{ old('status', $keluhan->status) }}">
            <option value="Ditolak">Ditolak</option>
            <option value="Pending">Pending</option>
            <option value="Terkirim">Terkirim</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection