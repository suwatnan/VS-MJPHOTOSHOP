<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class payment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payment';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'paymentID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['paymentID', 'printphotoID', 'imagebill','comment'];
    public $timestamps = false;
    
}
