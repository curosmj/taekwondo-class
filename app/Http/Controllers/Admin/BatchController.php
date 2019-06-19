<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Batch\IndexBatch;
use App\Http\Requests\Admin\Batch\StoreBatch;
use App\Http\Requests\Admin\Batch\UpdateBatch;
use App\Http\Requests\Admin\Batch\DestroyBatch;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Batch;

class BatchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexBatch $request
     * @return Response|array
     */
    public function index(IndexBatch $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Batch::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'batch_name', 'batch_rank_id'],

            // set columns to searchIn
            ['id', 'batch_name']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.batch.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.batch.create');

        return view('admin.batch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBatch $request
     * @return Response|array
     */
    public function store(StoreBatch $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Batch
        $batch = Batch::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/batches'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/batches');
    }

    /**
     * Display the specified resource.
     *
     * @param  Batch $batch
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Batch $batch)
    {
        $this->authorize('admin.batch.show', $batch);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Batch $batch
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Batch $batch)
    {
        $this->authorize('admin.batch.edit', $batch);

        return view('admin.batch.edit', [
            'batch' => $batch,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBatch $request
     * @param  Batch $batch
     * @return Response|array
     */
    public function update(UpdateBatch $request, Batch $batch)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Batch
        $batch->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/batches'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/batches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyBatch $request
     * @param  Batch $batch
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyBatch $request, Batch $batch)
    {
        $batch->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
