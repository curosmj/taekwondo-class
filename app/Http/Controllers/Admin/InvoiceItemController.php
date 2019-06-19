<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\InvoiceItem\IndexInvoiceItem;
use App\Http\Requests\Admin\InvoiceItem\StoreInvoiceItem;
use App\Http\Requests\Admin\InvoiceItem\UpdateInvoiceItem;
use App\Http\Requests\Admin\InvoiceItem\DestroyInvoiceItem;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\InvoiceItem;

class InvoiceItemController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexInvoiceItem $request
     * @return Response|array
     */
    public function index(IndexInvoiceItem $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(InvoiceItem::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'product_id', 'invoice_id', 'service_id', 'quantity'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.invoice-item.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.invoice-item.create');

        return view('admin.invoice-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreInvoiceItem $request
     * @return Response|array
     */
    public function store(StoreInvoiceItem $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the InvoiceItem
        $invoiceItem = InvoiceItem::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/invoice-items'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/invoice-items');
    }

    /**
     * Display the specified resource.
     *
     * @param  InvoiceItem $invoiceItem
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(InvoiceItem $invoiceItem)
    {
        $this->authorize('admin.invoice-item.show', $invoiceItem);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  InvoiceItem $invoiceItem
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(InvoiceItem $invoiceItem)
    {
        $this->authorize('admin.invoice-item.edit', $invoiceItem);

        return view('admin.invoice-item.edit', [
            'invoiceItem' => $invoiceItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateInvoiceItem $request
     * @param  InvoiceItem $invoiceItem
     * @return Response|array
     */
    public function update(UpdateInvoiceItem $request, InvoiceItem $invoiceItem)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values InvoiceItem
        $invoiceItem->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/invoice-items'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/invoice-items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyInvoiceItem $request
     * @param  InvoiceItem $invoiceItem
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyInvoiceItem $request, InvoiceItem $invoiceItem)
    {
        $invoiceItem->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
