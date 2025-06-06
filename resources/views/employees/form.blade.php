@php
    $edit = isset($employee);
@endphp

<div class="row">
    <div class="col-md-6">
        <label>Name</label>
        <input type="text" name="name" class="form-control bg-dark text-white"
               value="{{ old('name', $edit ? $employee->name : '') }}" required>

        <label class="mt-2">Email</label>
        <input type="email" name="email" class="form-control bg-dark text-white"
               value="{{ old('email', $edit ? $employee->email : '') }}" required>

        <label class="mt-2">Position</label>
        <input type="text" name="position" class="form-control bg-dark text-white"
               value="{{ old('position', $edit ? $employee->position : '') }}" required>

        <label class="mt-2">Role</label>
        <input type="text" name="role" class="form-control bg-dark text-white"
               value="{{ old('role', $edit ? $employee->role : '') }}">

        <label class="mt-2">Department</label>
        <input type="text" name="department" class="form-control bg-dark text-white"
               value="{{ old('department', $edit ? $employee->department : '') }}">

        <label class="mt-2">Company</label>
        <select name="company_id" class="form-control bg-dark text-white" required>
            <option value="">Select Company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}"
                    {{ old('company_id', $edit ? $employee->company_id : '') == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>

        <label class="mt-2">Manager (optional)</label>
        <select name="manager_id" class="form-control bg-dark text-white">
            <option value="">Select Manager</option>
            @foreach($managers as $manager)
                <option value="{{ $manager->id }}"
                    {{ old('manager_id', $edit ? $employee->manager_id : '') == $manager->id ? 'selected' : '' }}>
                    {{ $manager->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label>Country</label>
        <select id="country" name="country" class="form-control bg-dark text-white" required></select>

        <label class="mt-2">State</label>
        <select id="state" name="state" class="form-control bg-dark text-white" required></select>

        <label class="mt-2">City</label>
        <select id="city" name="city" class="form-control bg-dark text-white" required></select>
    </div>
</div>

@push('scripts')
<script>
    const token = "YOUR_ACCESS_TOKEN_HERE"; // Replace with your API token
    const countrySelect = document.getElementById("country");
    const stateSelect = document.getElementById("state");
    const citySelect = document.getElementById("city");

    async function fetchCountries() {
        const res = await fetch("https://www.universal-tutorial.com/api/countries/", {
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        });
        const countries = await res.json();
        countrySelect.innerHTML = '<option value="">Select Country</option>';
        countries.forEach(c => {
            countrySelect.innerHTML += `<option value="${c.country_name}">${c.country_name}</option>`;
        });

        // Pre-fill values on edit
        @if(old('country', $edit ? $employee->country : false))
            countrySelect.value = "{{ old('country', $edit ? $employee->country : '') }}";
            await fetchStates(countrySelect.value);
        @endif
    }

    async function fetchStates(country) {
        const res = await fetch(`https://www.universal-tutorial.com/api/states/${country}`, {
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        });
        const states = await res.json();
        stateSelect.innerHTML = '<option value="">Select State</option>';
        citySelect.innerHTML = '<option value="">Select City</option>';
        states.forEach(s => {
            stateSelect.innerHTML += `<option value="${s.state_name}">${s.state_name}</option>`;
        });

        @if(old('state', $edit ? $employee->state : false))
            stateSelect.value = "{{ old('state', $edit ? $employee->state : '') }}";
            await fetchCities(stateSelect.value);
        @endif
    }

    async function fetchCities(state) {
        const res = await fetch(`https://www.universal-tutorial.com/api/cities/${state}`, {
            headers: {
                "Authorization": "Bearer " + token,
                "Accept": "application/json"
            }
        });
        const cities = await res.json();
        citySelect.innerHTML = '<option value="">Select City</option>';
        cities.forEach(c => {
            citySelect.innerHTML += `<option value="${c.city_name}">${c.city_name}</option>`;
        });

        @if(old('city', $edit ? $employee->city : false))
            citySelect.value = "{{ old('city', $edit ? $employee->city : '') }}";
        @endif
    }

    countrySelect.addEventListener("change", () => fetchStates(countrySelect.value));
    stateSelect.addEventListener("change", () => fetchCities(stateSelect.value));

    fetchCountries();
</script>
@endpush
