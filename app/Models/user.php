<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class user extends Model
{
    protected $table='users';//Ignore automatically add "s" into class name to be table name    
    protected $primaryKey='userID'; //Ignore automatically query with id as primary key
    public $timestamps = false; // Ignore automatically add create_at/update_at fields into tabl 
    protected $fillable = [ 'imageFileName', 'username', 'password', 'firstname', 'lastname', 'address', 'email', 'phone'];

    public static function login($username,$password)
    {
        return DB::table('users')
                ->select('*')
                ->where('username', $username)
                ->Where('password', $password)
                ->first();
    }
    
}
