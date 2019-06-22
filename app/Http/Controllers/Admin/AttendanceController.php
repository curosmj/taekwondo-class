<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Attendance\IndexAttendance;
use App\Http\Requests\Admin\Attendance\StoreAttendance;
use App\Http\Requests\Admin\Attendance\UpdateAttendance;
use App\Http\Requests\Admin\Attendance\DestroyAttendance;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Attendance;

class AttendanceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexAttendance $request
     * @return Response|array
     */
    public function index(IndexAttendance $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Attendance::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'batch_id', 'student_id', 'comment', 'created_at'],

            // set columns to searchIn
            ['id', 'comment']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.attendance.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.attendance.create');

        return view('admin.attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreAttendance $request
     * @return Response|array
     */
    public function store(StoreAttendance $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Attendance
        $attendance = Attendance::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/attendances'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/attendances');
    }

    /**
     * Display the specified resource.
     *
     * @param  Attendance $attendance
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Attendance $attendance)
    {
        $this->authorize('admin.attendance.show', $attendance);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Attendance $attendance
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Attendance $attendance)
    {
        $this->authorize('admin.attendance.edit', $attendance);

        return view('admin.attendance.edit', [
            'attendance' => $attendance,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateAttendance $request
     * @param  Attendance $attendance
     * @return Response|array
     */
    public function update(UpdateAttendance $request, Attendance $attendance)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Attendance
        $attendance->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/attendances'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/attendances');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyAttendance $request
     * @param  Attendance $attendance
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyAttendance $request, Attendance $attendance)
    {
        $attendance->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
