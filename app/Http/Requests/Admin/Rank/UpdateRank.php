<?php namespace App\Http\Requests\Admin\Rank;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateRank extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.rank.edit', $this->rank);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'rank_name' => ['sometimes', 'string'],
            'rank_description' => ['sometimes', 'string'],
            'rank_order' => ['sometimes', 'string'],
            
        ];
    }
}
