<?php namespace App\Http\Requests\Admin\Rank;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreRank extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.rank.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'rank_name' => ['required', 'string'],
            'rank_description' => ['required', 'string'],
            'rank_order' => ['required', 'string'],
            
        ];
    }
}
