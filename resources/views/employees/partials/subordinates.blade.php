<ul>
@foreach ($employees as $emp)
    @if ($emp->manager_id == $manager_id)
        <li>
            {{ $emp->name }}
            @include('employees.partials.subordinates', ['employees' => $employees, 'manager_id' => $emp->id])
        </li>
    @endif
@endforeach
</ul>
