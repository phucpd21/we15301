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

    public function InvoiceDetails() {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Chỉnh sửa dữ liệu đầu ra khi đối tượng gọi thuộc tính. Trường hợp muốn lấy dữ liệu gốc thì dùng hàm getRawOriginal('attributeName')
    // Accessor get{AttributeName}Attribute
    public function getTotalAttribute() {
        $total_price = $this->attributes['total_price']. ' VND';
        return $total_price;
    }
}
