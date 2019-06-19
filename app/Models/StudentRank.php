<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentRank extends Model
{
    protected $table = "student_rank";
    
    protected $fillable = [
        "rank_id",
        "student_id",
        "awarded_date",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "awarded_date",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/student-ranks/'.$this->getKey());
    }

    public function student() {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function rank() {
        return $this->belongsTo(Rank::class, 'rank_id');
    }
}
