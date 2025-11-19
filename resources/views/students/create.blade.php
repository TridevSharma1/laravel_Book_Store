@extends('base')

@section('title', 'Add Student')

@section('content')
<div class="card shadow p-4">
    <h3 class="mb-4">Add New Student</h3>

    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">Student Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter name" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter email">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Phone</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Address</label>
            <textarea name="address" class="form-control" rows="3" placeholder="Enter address"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Student Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-dark w-100">Save Student</button>
    </form>
</div>
@endsection
