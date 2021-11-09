<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class printphoto extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'printphoto';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'printphotoID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['printphotoID', 'status', 'userID'];

    
}
