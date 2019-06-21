<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Student\IndexStudent;
use App\Http\Requests\Admin\Student\StoreStudent;
use App\Http\Requests\Admin\Student\UpdateStudent;
use App\Http\Requests\Admin\Student\DestroyStudent;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Student;

class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudent $request
     * @return Response|array
     */
    public function index(IndexStudent $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Student::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'dob', 'person_id', 'mother_id', 'father_id', 'status'],

            // set columns to searchIn
            ['id', 'status']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student.create');

        return view('admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudent $request
     * @return Response|array
     */
    public function store(StoreStudent $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Student
        $student = Student::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  Student $student
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Student $student)
    {
        $this->authorize('admin.student.show', $student);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Student $student
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Student $student)
    {
        $this->authorize('admin.student.edit', $student);

        return view('admin.student.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudent $request
     * @param  Student $student
     * @return Response|array
     */
    public function update(UpdateStudent $request, Student $student)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Student
        $student->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/students'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudent $request
     * @param  Student $student
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudent $request, Student $student)
    {
        $student->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
