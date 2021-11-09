<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class editpayment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'editpayment';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'editpaymentID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['editpaymentID', 'printphotoID', 'imagebill2'];
    public $timestamps = false;
    
}
