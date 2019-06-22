<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = "schedule";
    
    protected $fillable = [
        "day_of_week",
        "start_time",
        "end_time",
        "batch_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    protected $with = ['batch'];
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/schedules/'.$this->getKey());
    }

    public function batch() {
        return $this->belongsTo(Batch::class, 'batch_id');
    }
}
