<?php namespace App\Http\Requests\Admin\InvoiceItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreInvoiceItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.invoice-item.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'product_id' => ['nullable', Rule::unique('invoice_item', 'product_id'), 'integer'],
            'invoice_id' => ['required', Rule::unique('invoice_item', 'invoice_id'), 'integer'],
            'service_id' => ['nullable', Rule::unique('invoice_item', 'service_id'), 'integer'],
            'quantity' => ['required', 'numeric'],
            
        ];
    }
}
