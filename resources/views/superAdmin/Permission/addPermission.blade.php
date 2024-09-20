@extends('superAdmin.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($permission) ? 'Edit Permission' : 'Add Permission' }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.permissionPage') }}">Permission</a></li>
                        <li class="breadcrumb-item active">{{ isset($permission) ? 'Edit Permission' : 'Add Permission' }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ isset($permission) ? route('admin.updatePermission', $permission->id) : route('admin.storePermission') }}" method="POST">
                        @csrf
                        @if(isset($permission))
                        @method('PUT')
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <div class="form-inline">
                                    <div class="form-group mr-5 col-md-4">
                                        <label for="exampleInputPermission" class="mr-2">Enter Permisstion Title</label>
                                        <input type="text" class="form-control w-100 mt-2" name="permission_title" placeholder="Enter Permisstion title" value="{{ isset($permission) ? $permission->permission_title : old('permission_title') }}">
                                        @error('permission_title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mr-5 col-md-4">
                                        <label for="pemission_name" class="mr-2">Enter Permisstion Name</label>
                                        <input type="text" class="form-control w-100 mt-2" name="permission_name" placeholder="Enter Permisstion Name" value="{{ isset($permission) ? $permission->permission_name : old('permission_name') }}">
                                        @error('permission_name')
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
