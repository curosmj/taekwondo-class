<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Rank\IndexRank;
use App\Http\Requests\Admin\Rank\StoreRank;
use App\Http\Requests\Admin\Rank\UpdateRank;
use App\Http\Requests\Admin\Rank\DestroyRank;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Rank;

class RankController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexRank $request
     * @return Response|array
     */
    public function index(IndexRank $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Rank::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'rank_name', 'rank_description', 'rank_order'],

            // set columns to searchIn
            ['id', 'rank_name', 'rank_description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.rank.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.rank.create');

        return view('admin.rank.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreRank $request
     * @return Response|array
     */
    public function store(StoreRank $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Rank
        $rank = Rank::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ranks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ranks');
    }

    /**
     * Display the specified resource.
     *
     * @param  Rank $rank
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Rank $rank)
    {
        $this->authorize('admin.rank.show', $rank);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Rank $rank
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Rank $rank)
    {
        $this->authorize('admin.rank.edit', $rank);

        return view('admin.rank.edit', [
            'rank' => $rank,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRank $request
     * @param  Rank $rank
     * @return Response|array
     */
    public function update(UpdateRank $request, Rank $rank)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Rank
        $rank->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ranks'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ranks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyRank $request
     * @param  Rank $rank
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyRank $request, Rank $rank)
    {
        $rank->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
