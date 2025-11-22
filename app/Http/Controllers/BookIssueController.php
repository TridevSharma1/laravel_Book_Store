<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;
use App\Models\BookIssue;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    // Show create form
    public function create()
    {
        $books = Book::all();
        $students = Student::all();

        return view('students.bookform', compact('books', 'students'));
    }
    public function index()
    {
        $issues = BookIssue::with(['book', 'student'])->latest()->get();

        return view('students.bookissue_list', compact('issues'));
    }


    // Store issue record
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'student_id' => 'required|exists:students,id',
            'issue_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:issue_date',
            'status' => 'required|string',
        ]);

        BookIssue::create($request->all());

        return redirect()->back()->with('success', 'Book issued successfully!');
    }
}
