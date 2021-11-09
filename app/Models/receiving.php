<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class receiving extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'receiving';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'receivingID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['receivingID', 'receivingname'];

    
}
