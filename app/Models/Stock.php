<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'stocks';

    protected $fillable = ['item_name','item_code','quantity','location','store_id','in_stock'];

    public function store() {
        return $this->belongsTo('App\Models\Store','store_id','id');
    }
}
