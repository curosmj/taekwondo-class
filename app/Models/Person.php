<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = "person";
    
    protected $fillable = [
        "person_fname",
        "person_lname",
        "person_gender",
        "mobile_no",
        "email",
        "address",
        "postal_code"
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    protected $appends = ['resource_url', 'full_name'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/people/'.$this->getKey());
    }

    public function getFullNameAttribute() {
        return "{$this->person_fname} {$this->person_lname}";
    }
    
}
