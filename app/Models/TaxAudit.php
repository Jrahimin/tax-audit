<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxAudit extends Model
{
    protected $table = 'tax_invoices';
    protected $guarded = ['id'];

    public function taxPayer(){
        return $this->belongsTo(TaxPayer::class);
    }
}
