<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = "batch";
    
    protected $fillable = [
        "batch_name",
        "batch_rank_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    protected $with = ['rank'];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/batches/'.$this->getKey());
    }

    public function rank() {
        return $this->belongsTo(Rank::class, 'batch_rank_id');
    }
}
