<?php namespace App\Http\Requests\Admin\Attendance;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAttendance extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return Gate::allows('admin.attendance.create');
    }

/**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        return [
            'batch_id' => ['required', 'integer'],
            'student_id' => ['required', 'integer'],
            'comment' => ['nullable', 'string'],
            
        ];
    }
}
