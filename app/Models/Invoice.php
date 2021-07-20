<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'total_price',
        'status'
    ];

    public function IvoiceDetails() {
        return $this->hasMany(IvoiceDetail::class, 'invoice_id', 'id');
    }
}
