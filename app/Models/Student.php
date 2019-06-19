<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "student";
    
    protected $fillable = [
        "dob",
        "address",
        "mother_id",
        "father_id",
        "status",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "dob",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/students/'.$this->getKey());
    }
 
    public function mother() {
        return $this->belongsTo(Person::class, 'mother_id');
    }

    public function father() {
        return $this->belongsTo(Person::class, 'father_id');
    }
}
