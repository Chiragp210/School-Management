@extends('superAdmin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Roles and Permissions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Roles and Permissions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Roles and Permissions List</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Role Name</th>
                                            <th>Permissions</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($roles as $role)
                                            <tr>
                                                <td>{{ $role->role_name }}</td>
                                                <td>
                                                    @forelse($role->permissions as $index =>$permission)
                                                        <span class="badge bg-info mt-2" style="font-size: 15px; margin-right: 5px;">
                                                            {{ $permission->permission_title }}
                                                        </span>
                                                        @if(($index + 1) % 5 == 0)
                                                            <br>
                                                        @endif
                                                    @empty
                                                        <span class="badge bg-secondary" style="font-size: 15px; margin-right: 5px;">No Permissions Assigned</span>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.editRolePermission', $role->id) }}" class="btn btn-warning mr-2"><i class="bi bi-pen-fill"></i></a>
                                                    <form action="{{ route('admin.deleteRolePermission', $role->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger mr-2" onclick="return confirm('Are you sure you want to delete this Role-Permission?')"><i class="bi bi-trash-fill"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">No Roles Found</td>
                                            </tr>
                                        @endforelse
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
        </div>
    </section>
</div>
@endsection
