<?php
namespace App\Http\Controllers;


use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
public function index()
{
$students = Student::orderBy('created_at','desc')->get();
return view('students.index', compact('students'));
}


public function create()
{
return view('students.create');
}


public function store(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:students,email',
'phone' => 'nullable|string|max:50',
'department' => 'nullable|string|max:100',
]);
Student::create($validated);
return redirect()->route('students.index')->with('success','Student added');
}


public function edit(Student $student)
{
return view('students.edit', compact('student'));
}


public function update(Request $request, Student $student)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:students,email,' . $student->id,
'phone' => 'nullable|string|max:50',
'department' => 'nullable|string|max:100',
]);
$student->update($validated);
return redirect()->route('students.index')->with('success','Student updated');
}


public function destroy(Student $student)
{
$student->delete();
return redirect()->route('students.index')->with('success','Student deleted');
}
}