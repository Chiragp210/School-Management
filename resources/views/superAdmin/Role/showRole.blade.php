@extends('superAdmin.layout')

@section('content')
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Role Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <form action="{{ route('admin.rolePage') }}" method="GET">
                        <div class="card">
                            <div class="card-body">
                            <h5>Filter Permissions</h5>
                            <div class="form-inline">
                                <div class="form-group mr-5">
                                    <label for="filter_role_name" class="mr-2">Filter by Role Name</label>
                                    <input type="text" class="form-control w-100 mt-2" name="filter_role_name" placeholder="Enter Role name" value="{{ request('filter_role_name') }}">
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('admin.rolePage') }}" class="btn btn-warning">Clear</a>
                            </div>
                        </div>
                        </div>
                    </form>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Role Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->role_name }}</td>
                                    <td>
                                        <a href="{{ route('admin.editRole', $role->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pen-fill"></i></a>
                                        <form action="{{ route('admin.deleteRole', $role->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this permission?')"><i class="bi bi-trash-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $roles->links('pagination::bootstrap-5') }}

                    </div>
                </div>
                </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
