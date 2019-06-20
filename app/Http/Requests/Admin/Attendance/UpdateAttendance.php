<?php namespace App\Http\Requests\Admin\Attendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.attendance.edit', $this->attendance);
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'batch_id' => ['sometimes', 'integer'],
            'student_id' => ['sometimes', 'integer'],
            'comment' => ['sometimes', 'string'],
            
        ];
    }
}
