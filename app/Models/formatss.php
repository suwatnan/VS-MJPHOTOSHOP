<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formatss extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formatss';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'formatID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['formatID', 'formatname'];

    
}
