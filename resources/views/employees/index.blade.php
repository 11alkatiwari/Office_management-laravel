@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Employees</h2>
    <a href="{{ route('employees.create') }}" class="btn btn-success mb-3">+ Add New Employee</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('employees.index') }}" class="row mb-4">
        <div class="col-md-3">
            <label for="company_id" class="form-label">Company</label>
            <select name="company_id" id="company_id" class="form-select">
                <option value="">All Companies</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ request('company_id') == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="position" class="form-label">Position</label>
            <select name="position" id="position" class="form-select">
                <option value="">All Positions</option>
                @foreach($positions as $position)
                    <option value="{{ $position }}" {{ request('position') == $position ? 'selected' : '' }}>
                        {{ $position }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="manager_id" class="form-label">Manager</label>
            <select name="manager_id" id="manager_id" class="form-select">
                <option value="">All Managers</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ request('manager_id') == $manager->id ? 'selected' : '' }}>
                        {{ $manager->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    {{-- Employee Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-dark" id="employeeTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th>Company</th>
                    <th>Manager</th>
                    <th>Country</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Role</th>
                    <th>Department</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->company->name ?? '-' }}</td>
                        <td>{{ $employee->manager->name ?? '-' }}</td>
                        <td>{{ $employee->country }}</td>
                        <td>{{ $employee->state }}</td>
                        <td>{{ $employee->city }}</td>
                        <td>{{ $employee->role ?? '-' }}</td>
                        <td>{{ $employee->department ?? '-' }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $employees->links() }}
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#employeeTable').DataTable({
            "lengthChange": false,
            "pageLength": 10,
            "order": [[0, "asc"]],
            "language": {
                "search": "Search:"
            }
        });
    });
</script>
@endpush
