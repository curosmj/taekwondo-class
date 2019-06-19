<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Service\IndexService;
use App\Http\Requests\Admin\Service\StoreService;
use App\Http\Requests\Admin\Service\UpdateService;
use App\Http\Requests\Admin\Service\DestroyService;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Service;

class ServiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexService $request
     * @return Response|array
     */
    public function index(IndexService $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Service::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'service_name', 'service_description', 'service_selling_price', 'service_num_days'],

            // set columns to searchIn
            ['id', 'service_name', 'service_description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.service.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.service.create');

        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreService $request
     * @return Response|array
     */
    public function store(StoreService $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Service
        $service = Service::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/services'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/services');
    }

    /**
     * Display the specified resource.
     *
     * @param  Service $service
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Service $service)
    {
        $this->authorize('admin.service.show', $service);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Service $service
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Service $service)
    {
        $this->authorize('admin.service.edit', $service);

        return view('admin.service.edit', [
            'service' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateService $request
     * @param  Service $service
     * @return Response|array
     */
    public function update(UpdateService $request, Service $service)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Service
        $service->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/services'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyService $request
     * @param  Service $service
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyService $request, Service $service)
    {
        $service->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
