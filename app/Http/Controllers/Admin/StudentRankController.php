<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\StudentRank\IndexStudentRank;
use App\Http\Requests\Admin\StudentRank\StoreStudentRank;
use App\Http\Requests\Admin\StudentRank\UpdateStudentRank;
use App\Http\Requests\Admin\StudentRank\DestroyStudentRank;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\StudentRank;

class StudentRankController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexStudentRank $request
     * @return Response|array
     */
    public function index(IndexStudentRank $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(StudentRank::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'rank_id', 'student_id', 'awarded_date'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.student-rank.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.student-rank.create');

        return view('admin.student-rank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreStudentRank $request
     * @return Response|array
     */
    public function store(StoreStudentRank $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the StudentRank
        $studentRank = StudentRank::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-ranks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-ranks');
    }

    /**
     * Display the specified resource.
     *
     * @param  StudentRank $studentRank
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(StudentRank $studentRank)
    {
        $this->authorize('admin.student-rank.show', $studentRank);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  StudentRank $studentRank
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(StudentRank $studentRank)
    {
        $this->authorize('admin.student-rank.edit', $studentRank);

        return view('admin.student-rank.edit', [
            'studentRank' => $studentRank,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateStudentRank $request
     * @param  StudentRank $studentRank
     * @return Response|array
     */
    public function update(UpdateStudentRank $request, StudentRank $studentRank)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values StudentRank
        $studentRank->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/student-ranks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/student-ranks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyStudentRank $request
     * @param  StudentRank $studentRank
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyStudentRank $request, StudentRank $studentRank)
    {
        $studentRank->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
