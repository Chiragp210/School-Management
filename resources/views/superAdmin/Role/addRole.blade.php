@extends('superAdmin.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($role) ? 'Edit Role' : 'Add Role' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.rolePage') }}">Role</a></li>
                        <li class="breadcrumb-item active">{{ isset($role) ? 'Edit Role' : 'Add Role' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ isset($role) ? route('admin.updateRole',$role->id) :route('admin.storeRole') }}" method="POST">
                        @csrf
                        @if(isset($role))
                            @method('PUT')
                        @endif
                        <div class="card">
                        <div class="card-body">
                            <div class="form-inline">
                                <div class="form-group mr-5 col-md-4">
                                    <label for="role_name" class="mr-2">Enter Role Name</label>
                                    <input type="text" class="form-control w-100 mt-2" name="role_name" placeholder="Enter Role Name" value="{{ isset($role) ? $role->role_name : old('role_name') }}">
                                    @error('role_name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection
