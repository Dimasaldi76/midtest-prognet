@extends('layouts.mainuser')
@section('content')
<div class="container-fluid py-4">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>List Keluhan</h6>
            <div class="pull-right">
              <a href="{{ url('keluhan/add') }}" class="btn btn-success btn-sm">
                  <i class="fa fa-plus"></i> Add
              </a>
          </div>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NO</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keluhan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Edit</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($keluhan as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>@if ($item->status == 'Ditolak')
                        <a href="" class="btn btn-sm btn-danger">Ditolak</a>
                        @elseif ($item->status == 'Pending')
                        <a href="" class="btn btn-sm btn-warning">Pending</a>
                        @else
                        <a href="" class="btn btn-sm btn-success">Terkirim</a>
                        @endif</td></td>
                    <td class="align-middle">
                        <a href="{{  url('keluhan/edit/'.$item->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form action="{{ url('keluhan/'.$item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus Data?')">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i>
                        </button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection