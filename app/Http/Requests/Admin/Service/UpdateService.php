<?php namespace App\Http\Requests\Admin\Service;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateService extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.service.edit', $this->service);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'service_name' => ['sometimes', 'string'],
            'service_description' => ['sometimes', 'string'],
            'service_selling_price' => ['sometimes', 'numeric'],
            'service_num_days' => ['sometimes', 'integer'],
            
        ];
    }
}
