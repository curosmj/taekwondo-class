<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";
    
    protected $fillable = [
        "batch_id",
        "student_id",
        "comment",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/attendances/'.$this->getKey());
    }

    public function batch() {
        return $this->belongsTo(Batch::class, 'batch_id');
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
