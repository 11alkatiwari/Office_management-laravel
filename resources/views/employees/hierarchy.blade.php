@extends('layout')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Employee Hierarchy</h3>
    <ul>
        @foreach ($employees as $employee)
            @if (!$employee->manager_id)
                <li>
                    <strong>{{ $employee->name }}</strong>
                    @include('employees.partials.subordinates', ['employees' => $employees, 'manager_id' => $employee->id])
                </li>
            @endif
        @endforeach
    </ul>
</div>
@endsection
