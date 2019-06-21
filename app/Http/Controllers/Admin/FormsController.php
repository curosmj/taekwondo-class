<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Person;
use App\Models\Student;
use App\Models\StudentRank;

class FormsController extends Controller
{
  public function student(Request $request)
  {
    $this->validate($request, [
      'person_id' => ['sometimes', 'nullable', 'unique:student,person_id'],
      'dob' => ['required', 'date'],
      'status' => ['required', 'string'],
      'rank_id' => ['required', 'integer', 'exists:rank,id'],
      'awarded_date' => ['required', 'date'],
    ]);

    if (!$request->filled('father_id')) {
      echo 'validating fahter';
      $this->validate($request, [
        'father_fname' => ['required', 'string'],
        'father_lname' => ['required', 'string'],
        'father_mobile_no' => ['required', 'integer'],
        'father_email' => ['required', 'email', 'string'],
        'father_address' => ['required', 'string'],
        'father_postal_code' => ['required', 'string'],
      ]);
    }

    if (!$request->filled('mother_id')) {
      echo 'validating mother';
      $this->validate($request, [
        'mother_fname' => ['required', 'string'],
        'mother_lname' => ['required', 'string'],
        'mother_mobile_no' => ['required', 'integer'],
        'mother_email' => ['required', 'email', 'string'],
        'mother_address' => ['required', 'string'],
        'mother_postal_code' => ['required', 'string'],
      ]);
    }

    if (!$request->filled('person_id')) {
      echo 'validating person';
      $this->validate($request, [
        'person_fname' => ['required', 'string'],
        'person_lname' => ['required', 'string'],
        'mobile_no' => ['required', 'integer'],
        'email' => ['required', 'email', 'string'],
        'person_gender' => ['required', 'string', 'in:male,female'],
        'address' => ['required', 'string'],
        'postal_code' => ['required', 'string'],
      ]);
    }

    if ($request->filled('father_id')) {
      $father_id = $request->get('father_id');
    } else {
      $father = Person::create([
        'person_fname' => $request->get('father_fname'),
        'person_lname' => $request->get('father_lname'),
        'mobile_no' => $request->get('father_mobile_no'),
        'email' => $request->get('father_email'),
        'person_gender' => 'male',
        'address' => $request->get('father_address'),
        'postal_code' => $request->get('father_postal_code')
      ]);
      $father_id = $father->id;
      echo ' fahter created';
    }

    if ($request->filled('mother_id')) {
      $mother_id = $request->get('mother_id');
    } else {
      $mother = Person::create([
        'person_fname' => $request->get('mother_fname'),
        'person_lname' => $request->get('mother_lname'),
        'mobile_no' => $request->get('mother_mobile_no'),
        'email' => $request->get('mother_email'),
        'person_gender' => 'female',
        'address' => $request->get('mother_address'),
        'postal_code' => $request->get('mother_postal_code')
      ]);
      $mother_id = $mother->id;
      echo ' mother created';
    }

    if ($request->filled('person_id')) {
      $person_id = $request->get('person_id');
    } else {
      echo ' stu per creating';
      $person = Person::create([
        'person_fname' => $request->get('person_fname'),
        'person_lname' => $request->get('person_lname'),
        'mobile_no' => $request->get('mobile_no'),
        'email' => $request->get('email'),
        'person_gender' => $request->get('person_gender'),
        'address' => $request->get('address'),
        'postal_code' => $request->get('postal_code')
      ]);
      $person_id = $person->id;
      echo ' stu per created';
    }

    $student = Student::create([
      'person_id' => $person_id,
      'mother_id' => $mother_id,
      'father_id' => $father_id,
      'dob' => $request->get('dob'),
      'status' => $request->get('status')
    ]);
    echo ' stu created';


    $srank = StudentRank::create([
      'student_id' => $student->id,
      'rank_id' => $request->get('rank_id'),
      'awarded_date' => $request->get('awarded_date')
    ]);

    echo ' stu rank created';


    return 'done';
  }
}