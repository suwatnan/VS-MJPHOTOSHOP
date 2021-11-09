<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class formatprint extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'formatprint';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'formatprintID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['formatprintID', 'formatprint', 'imageFileName'];

    
}
