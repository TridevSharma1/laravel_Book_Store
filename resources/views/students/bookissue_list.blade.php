@extends('base')

@section('title', 'Book Issue List')

@section('content')
<div class="card shadow p-4">
    <h3 class="mb-4">Book Issue List</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Book</th>
                <th>Student</th>
                <th>Issue Date</th>
                <th>Return Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($issues as $index => $issue)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $issue->book->title }}</td>
                    <td>{{ $issue->student->name }}</td>
                    <td>{{ $issue->issue_date }}</td>
                    <td>{{ $issue->return_date ?? 'Not Returned' }}</td>
                    <td>
                        <span class="badge 
                            {{ $issue->status == 'issued' ? 'bg-warning' : 'bg-success' }}">
                            {{ ucfirst($issue->status) }}
                        </span>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No Book Issues Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
