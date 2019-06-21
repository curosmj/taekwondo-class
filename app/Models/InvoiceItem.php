<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    protected $table = "invoice_item";
    
    protected $fillable = [
        "product_id",
        "invoice_id",
        "service_id",
        "quantity",
    
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
        return url('/admin/invoice-items/'.$this->getKey());
    }

    public function product() {
        return $this->belongsTo(Product::class);
    } 
    
    public function service() {
        return $this->belongsTo(Service::class);
    } 
}
