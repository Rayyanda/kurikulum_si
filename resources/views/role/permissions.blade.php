@extends('layouts.app')

@section('content')
<div class="card shadow mb-4 m-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Permission Role {{ $role->name }}</h6>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('role.assign.permission', $role->id) }}" method="post">
            @csrf
            <div class="form-row">
                @foreach($permissions as $permission)
                <div class="col-md-3 mb-2">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="{{ $permission->name }}" name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $permission->name }}">{{ $permission->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Save1</button>
        </form>
    </div>
</div>
@endsection
