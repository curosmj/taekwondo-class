<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Schedule\IndexSchedule;
use App\Http\Requests\Admin\Schedule\StoreSchedule;
use App\Http\Requests\Admin\Schedule\UpdateSchedule;
use App\Http\Requests\Admin\Schedule\DestroySchedule;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Schedule;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexSchedule $request
     * @return Response|array
     */
    public function index(IndexSchedule $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Schedule::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'day_of_week', 'start_time', 'end_time', 'batch_id'],

            // set columns to searchIn
            ['id', 'day_of_week']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.schedule.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.schedule.create');

        return view('admin.schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSchedule $request
     * @return Response|array
     */
    public function store(StoreSchedule $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Schedule
        $schedule = Schedule::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/schedules'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/schedules');
    }

    /**
     * Display the specified resource.
     *
     * @param  Schedule $schedule
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Schedule $schedule)
    {
        $this->authorize('admin.schedule.show', $schedule);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Schedule $schedule
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Schedule $schedule)
    {
        $this->authorize('admin.schedule.edit', $schedule);

        return view('admin.schedule.edit', [
            'schedule' => $schedule,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSchedule $request
     * @param  Schedule $schedule
     * @return Response|array
     */
    public function update(UpdateSchedule $request, Schedule $schedule)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Schedule
        $schedule->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/schedules'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/schedules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroySchedule $request
     * @param  Schedule $schedule
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroySchedule $request, Schedule $schedule)
    {
        $schedule->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
