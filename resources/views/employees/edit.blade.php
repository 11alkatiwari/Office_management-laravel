@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow rounded p-4">
        <h2 class="mb-4">Edit Employee</h2>

        @if ($errors->any())
            <div class="alert alert-danger text-dark bg-light">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $employee->name) }}"
                           class="form-control bg-secondary text-white border-0" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}"
                           class="form-control bg-secondary text-white border-0" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Position</label>
                    <input type="text" name="position" value="{{ old('position', $employee->position) }}"
                           class="form-control bg-secondary text-white border-0" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Role</label>
                    <input type="text" name="role" value="{{ old('role', $employee->role) }}"
                           class="form-control bg-secondary text-white border-0">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Department</label>
                    <input type="text" name="department" value="{{ old('department', $employee->department) }}"
                           class="form-control bg-secondary text-white border-0">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Company</label>
                    <select name="company_id" class="form-select bg-secondary text-white border-0" required>
                        <option value="">Select Company</option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}" {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Manager</label>
                <select name="manager_id" class="form-select bg-secondary text-white border-0">
                    <option value="">None</option>
                    @foreach($managers as $manager)
                        <option value="{{ $manager->id }}" {{ old('manager_id', $employee->manager_id ?? '') == $manager->id ? 'selected' : '' }}>
                            {{ $manager->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Country</label>
                    <select name="country" id="country-dropdown" class="form-select bg-secondary text-white border-0" required>
                        <option value="">{{ $employee->country }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">State</label>
                    <select name="state" id="state-dropdown" class="form-select bg-secondary text-white border-0" required>
                        <option value="">{{ $employee->state }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">City</label>
                    <select name="city" id="city-dropdown" class="form-select bg-secondary text-white border-0" required>
                        <option value="">{{ $employee->city }}</option>
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('employees.index') }}" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-success">Update Employee</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
@include('employees.script')

<script>
    $(document).ready(function () {
        const selectedCountry = "{{ $employee->country }}";
        const selectedState = "{{ $employee->state }}";
        const selectedCity = "{{ $employee->city }}";

        setTimeout(() => {
            $('#country-dropdown').val(selectedCountry).trigger('change');
            setTimeout(() => {
                $('#state-dropdown').val(selectedState).trigger('change');
                setTimeout(() => {
                    $('#city-dropdown').val(selectedCity);
                }, 800);
            }, 800);
        }, 800);
    });
</script>
@endpush
@endsection
