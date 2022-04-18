@extends('layouts.mainuser')
@section('content')
<form action="{{ url('keluhan/add') }}" method="POST">
    @csrf
     <div class="form-group">
        <label>Keluhan</label>
        <input type="text" name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" value="{{ old('keluhan') }}" autofocus >
        @error('keluhan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection