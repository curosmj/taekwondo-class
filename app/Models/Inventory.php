<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = "inventory";
    
    protected $fillable = [
        "product_id",
        "inventory_quantity",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    protected $with = [];
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/inventories/'.$this->getKey());
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
