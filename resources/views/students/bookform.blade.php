@extends('base')

@section('title', 'Issue Book')

@section('content')
<div class="card shadow p-4">
    <h3 class="mb-4">Issue a Book</h3>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Error Messages --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bookissue.store') }}" method="POST">
        @csrf

        {{-- Select Book --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Select Book</label>
            <select name="book_id" class="form-select">
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Select Student --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Select Student</label>
            <select name="student_id" class="form-select">
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Issue Date --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Issue Date</label>
            <input type="date" name="issue_date" class="form-control">
        </div>

        {{-- Return Date --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Return Date</label>
            <input type="date" name="return_date" class="form-control">
        </div>

        {{-- Status --}}
        <div class="mb-3">
            <label class="form-label fw-bold">Status</label>
            <select name="status" class="form-select">
                <option value="issued">Issued</option>
                <option value="returned">Returned</option>
            </select>
        </div>

        <button class="btn btn-primary w-100">Issue Book</button>
    </form>
</div>
@endsection
