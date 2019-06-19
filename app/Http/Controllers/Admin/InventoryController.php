<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Inventory\IndexInventory;
use App\Http\Requests\Admin\Inventory\StoreInventory;
use App\Http\Requests\Admin\Inventory\UpdateInventory;
use App\Http\Requests\Admin\Inventory\DestroyInventory;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Inventory;

class InventoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexInventory $request
     * @return Response|array
     */
    public function index(IndexInventory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Inventory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'product_id', 'inventory_quantity'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.inventory.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.inventory.create');

        return view('admin.inventory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreInventory $request
     * @return Response|array
     */
    public function store(StoreInventory $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Inventory
        $inventory = Inventory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/inventories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/inventories');
    }

    /**
     * Display the specified resource.
     *
     * @param  Inventory $inventory
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Inventory $inventory)
    {
        $this->authorize('admin.inventory.show', $inventory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Inventory $inventory
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Inventory $inventory)
    {
        $this->authorize('admin.inventory.edit', $inventory);

        return view('admin.inventory.edit', [
            'inventory' => $inventory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateInventory $request
     * @param  Inventory $inventory
     * @return Response|array
     */
    public function update(UpdateInventory $request, Inventory $inventory)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Inventory
        $inventory->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/inventories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/inventories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyInventory $request
     * @param  Inventory $inventory
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyInventory $request, Inventory $inventory)
    {
        $inventory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
