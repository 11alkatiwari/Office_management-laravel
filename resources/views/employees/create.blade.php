@extends('layout')

@section('content')
<div class="container mt-5 text-light">
    <h2 class="mb-4">Add New Employee</h2>

    @if($errors->any())
        <div class="alert alert-danger text-dark">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('employees.store') }}" method="POST" class="bg-dark p-4 rounded shadow">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control bg-dark text-white" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control bg-dark text-white" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Position</label>
                <input type="text" name="position" value="{{ old('position') }}" class="form-control bg-dark text-white" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Company</label>
                <select name="company_id" class="form-select bg-dark text-white" required>
                    <option value="">Select Company</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Manager</label>
            <select name="manager_id" class="form-select bg-dark text-white border-secondary">
                <option value="">None</option>
                @foreach($managers as $manager)
                    <option value="{{ $manager->id }}" {{ old('manager_id') == $manager->id ? 'selected' : '' }}>
                        {{ $manager->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Role</label>
                <input type="text" name="role" value="{{ old('role') }}" class="form-control bg-dark text-white">
            </div>
            <div class="col-md-6">
                <label class="form-label">Department</label>
                <input type="text" name="department" value="{{ old('department') }}" class="form-control bg-dark text-white">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="country" class="form-label">Country</label>
                <select name="country" id="country-dropdown" class="form-select bg-dark text-white" required>
                    <option value="">Select Country</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <select name="state" id="state-dropdown" class="form-select bg-dark text-white" required>
                    <option value="">Select State</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="city" class="form-label">City</label>
                <select name="city" id="city-dropdown" class="form-select bg-dark text-white" required>
                    <option value="">Select City</option>
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('employees.index') }}" class="btn btn-outline-light">Cancel</a>
            <button type="submit" class="btn btn-success">Create Employee</button>
        </div>
    </form>
</div>

@push('scripts')
    @include('employees.script')
@endpush
@endsection
