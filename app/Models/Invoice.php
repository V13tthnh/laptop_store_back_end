<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Invoice extends Model
{
    use HasFactory;

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function invoiceDetails(){
        return $this->hasMany(InvoiceDetail::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y');
    }

    public function getTotalAttribute($value)
    {
        return $this->formatCurrencyVND($value);
    }

    function formatCurrencyVND($number) {
        return number_format($number, 0, ',', '.') . ' vnđ';
    }
}
