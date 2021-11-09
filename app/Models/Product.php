<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{

    protected $table = 'product';
    protected $primaryKey = 'productID';
    protected $fillable = [ 'imageFileName', 'productname', 'size', 'price', 'quantity'];
    public $timestamps = false;


}
