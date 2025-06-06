@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card bg-dark text-white shadow p-4 rounded">
        <h2 class="mb-4">Add New Company</h2>

        @if ($errors->any())
            <div class="alert alert-danger text-dark bg-light">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('companies.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Company Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="form-control bg-secondary text-white border-0" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" id="location" value="{{ old('location') }}"
                       class="form-control bg-secondary text-white border-0">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('companies.index') }}" class="btn btn-outline-light">Cancel</a>
                <button type="submit" class="btn btn-success">Create Company</button>
            </div>
        </form>
    </div>
</div>
@endsection
