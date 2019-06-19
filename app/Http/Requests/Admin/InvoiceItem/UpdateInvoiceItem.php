<?php namespace App\Http\Requests\Admin\InvoiceItem;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateInvoiceItem extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.invoice-item.edit', $this->invoiceItem);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'product_id' => ['nullable', Rule::unique('invoice_item', 'product_id')->ignore($this->invoiceItem->getKey(), $this->invoiceItem->getKeyName()), 'integer'],
            'invoice_id' => ['sometimes', Rule::unique('invoice_item', 'invoice_id')->ignore($this->invoiceItem->getKey(), $this->invoiceItem->getKeyName()), 'integer'],
            'service_id' => ['nullable', Rule::unique('invoice_item', 'service_id')->ignore($this->invoiceItem->getKey(), $this->invoiceItem->getKeyName()), 'integer'],
            'quantity' => ['sometimes', 'numeric'],
            
        ];
    }
}
