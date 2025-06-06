@csrf

<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Position</label>
    <input type="text" name="position" class="form-control" value="{{ old('position', $employee->position ?? '') }}" required>
</div>

<div class="mb-3">
    <label>Company</label>
    <select name="company_id" class="form-control" required>
        <option value="">Select</option>
        @foreach($companies as $company)
            <option value="{{ $company->id }}" {{ (old('company_id', $employee->company_id ?? '') == $company->id) ? 'selected' : '' }}>
                {{ $company->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Manager</label>
    <select name="manager_id" class="form-control">
        <option value="">None</option>
        @foreach($managers as $manager)
            <option value="{{ $manager->id }}" {{ (old('manager_id', $employee->manager_id ?? '') == $manager->id) ? 'selected' : '' }}>
                {{ $manager->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Country</label>
    <select name="country" id="country-dropdown" class="form-control" required></select>
</div>

<div class="mb-3">
    <label>State</label>
    <select name="state" id="state-dropdown" class="form-control" required></select>
</div>

<div class="mb-3">
    <label>City</label>
    <select name="city" id="city-dropdown" class="form-control" required></select>
</div>

<button class="btn btn-primary">{{ $buttonText }}</button>
