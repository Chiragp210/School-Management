@extends('superAdmin.layout')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ isset($roleItem) ? 'Edit Role-Permission' : 'Add Role-Permission'}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.showRolePermission') }}">Role-Permission</a></li>
                        <li class="breadcrumb-item active">{{ isset($roleItem) ? 'Edit Role-Permission' : 'Add Role-Permission'}}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ isset($roleItem) && $roleItem ? route('admin.updateRolePermission', $roleItem->id) : route('admin.storeRolePermission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="role">Select Role</label>
                            <select name="role_id" id="role" class="form-control">
                                <option value="">-- Select Role --</option>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ isset($roleItem) && $role->id == $roleItem->id ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Assign Permissions</label>
                            <div class="form-check">
                                <input type="checkbox" id="select-all" class="form-check-input">
                                <label for="select-all" class="form-check-label">Select All</label>
                            </div>
                            <div class="row mt-3">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="permission-checkbox" {{ isset($roleItem) && $roleItem->permissions->contains($permission) ? 'checked' : '' }}>
                                        {{ $permission->permission_name }}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ isset($roleItem) ? 'Update Permissions' : 'Assign Permissions' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    // Select All Permissions functionality
    document.getElementById('select-all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.permission-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });
</script>
@endsection
