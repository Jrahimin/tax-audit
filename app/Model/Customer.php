<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'mobile_no', 'address', 'unpaid'];

    public function salePackages(){
        return $this->hasMany(SalePackage::class);
    }
}
