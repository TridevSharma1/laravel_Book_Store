@extends('base')

@section('title', 'Student List')

@section('content')

<div class="card shadow p-4">
    <h3 class="mb-3">Student List</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('student.create') }}" class="btn btn-dark mb-3">+ Add Student</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>

                <td>
                    @if($student->image)
                        <img src="{{ asset('storage/' . $student->image) }}"
                             width="60" height="60" class="rounded">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>

                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-info" href="{#}">Back to product list</a>
</div>

@endsection
