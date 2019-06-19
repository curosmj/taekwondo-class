<?php namespace App\Http\Requests\Admin\StudentRank;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateStudentRank extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.student-rank.edit', $this->studentRank);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'rank_id' => ['sometimes', 'integer'],
            'student_id' => ['sometimes', 'integer'],
            'awarded_date' => ['sometimes', 'date'],
            
        ];
    }
}
