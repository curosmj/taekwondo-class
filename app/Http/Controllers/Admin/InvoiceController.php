<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Invoice\IndexInvoice;
use App\Http\Requests\Admin\Invoice\StoreInvoice;
use App\Http\Requests\Admin\Invoice\UpdateInvoice;
use App\Http\Requests\Admin\Invoice\DestroyInvoice;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Invoice;

class InvoiceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexInvoice $request
     * @return Response|array
     */
    public function index(IndexInvoice $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Invoice::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'amount', 'person_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.invoice.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.invoice.create');

        return view('admin.invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreInvoice $request
     * @return Response|array
     */
    public function store(StoreInvoice $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Invoice
        $invoice = Invoice::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/invoices'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  Invoice $invoice
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Invoice $invoice)
    {
        $this->authorize('admin.invoice.show', $invoice);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Invoice $invoice
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Invoice $invoice)
    {
        $this->authorize('admin.invoice.edit', $invoice);

        return view('admin.invoice.edit', [
            'invoice' => $invoice,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateInvoice $request
     * @param  Invoice $invoice
     * @return Response|array
     */
    public function update(UpdateInvoice $request, Invoice $invoice)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Invoice
        $invoice->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/invoices'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyInvoice $request
     * @param  Invoice $invoice
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyInvoice $request, Invoice $invoice)
    {
        $invoice->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }
