<?php namespace App\Http\Requests\Admin\StudentRank;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreStudentRank extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student-rank.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'rank_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
            'awarded_date' => ['required', 'date'],
            
        ];
    }
}
