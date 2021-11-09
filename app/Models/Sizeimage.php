<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Sizeimage extends Model
{

    protected $table = 'sizeimage';
    protected $primaryKey = 'sizeimageID';
    protected $fillable = [ 'size', 'price'];
    public $timestamps = false;


}
