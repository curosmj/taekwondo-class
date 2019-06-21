<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = "invoice";
    
    
    protected $fillable = [
        "amount",
        "person_id",
    
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
        return url('/admin/invoices/'.$this->getKey());
    }

    public function invoiceItems() {
        return $this->hasMany(InvoiceItem::class, 'invoice_id');
    }

    public function person() {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
