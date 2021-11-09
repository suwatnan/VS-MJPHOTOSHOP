<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Booking extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'booking';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'bookingID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['bookingID', 'date', 'formatID', 'timeID', 'note', 
                            'userID', 'queues', 'receivingID', 'status','statuspayment','created_at'];

    
}
