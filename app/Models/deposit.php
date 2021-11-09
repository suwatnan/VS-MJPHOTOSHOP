<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class deposit extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'deposit';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'depositID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['depositID', 'imagedeposit', 'bookingID','imagedeposit2','price','comment'];
    public $timestamps = false;
    
}
