@extends('layout')

@section('content')
<h2>Edit Company</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
    </div>
@endif

<form method="POST" action="{{ route('companies.update', $company->id) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Company Name</label>
        <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
    </div>
   
    <div class="mb-3">
        <label>Location</label>
        <input type="text" name="location" class="form-control" value="{{ $company->locaation }}">
    </div>
    <button class="btn btn-primary">Update Company</button>
</form>
@endsection
