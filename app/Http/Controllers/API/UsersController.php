<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Users;
use DB;

class UsersController extends Controller
{
    public function login(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $users = Users::login($username,$password);
        if($users){
            $user = (array)$users;
            $user['message'] = 'success';
            $user['status'] = 'true';    
           // $user['token'] = sha1($username . $password . "@%#XYaU12$");        
        }else{
            $user = array(
                'message' => 'this user is not found', 
                'status' => 'false');
        }

        return response()->json($user);
    }
    public function Register(Request $request)
    {
       //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
       //$this->validate($request, ['file' => 'image']);

        //upload file
        $imageFileName = "";        
        $file = $request->file('file');
        if(isset($file)){
            $file->move('images',$file->getClientOriginalName());
            $imageFileName = $file->getClientOriginalName();
        }
    
        $user = new Users();
        $user->username = $request->get('username');     
        $user->password = $request->get('password');
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');
        $user->address = $request->get('address');     
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');   
        $user->usertypeID = 1;
        $user->imageFileName = $imageFileName; 
        $user->save();                
        return response()->json(array(
            'message' => 'add a user successfully', 
            'status' => 'true'));  

    }

    public function view($id)
    {
        $sql="SELECT * FROM users WHERE users.userID='$id'";
        $user=DB::select($sql)[0];         
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {       
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        //$this->validate($request, ['file' => 'image']);

        $user = Users::find($id);
        $user->firstname = $request->get('firstname');
        $user->lastname = $request->get('lastname');        
        //$user->username = $request->get('username');
        $user->password = $request->get('password');
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->email = $request->get('email');
        //$user->lineID = $request->get('lineID');
        $user->usertypeID = 1;        

        $file = $request->file('file');
        if(isset($file)){
            $file->move('images',$file->getClientOriginalName());
            $user->imageFileName = $file->getClientOriginalName();
        }        

        $user->save();

        return response()->json(array(
            'message' => 'update a user successfully', 
            'status' => 'true'));
    }

/*public function updatepassword(Request $request, $id)
    {       
        //validate file uploading,  where image works for jpeg, png, bmp, gif, or svg
        //$this->validate($request, ['file' => 'image']);

        $user = Users::find($id);
        //$user->firstname = $request->get('firstname');
        //$user->lastname = $request->get('lastname');        
        //$user->username = $request->get('username');
        $user->password = $request->get('password');
        //$user->address = $request->get('address');
        //$user->phone = $request->get('phone');
        //$user->email = $request->get('email');
        //$user->lineID = $request->get('lineID');
        //$user->usertypeID = $request->get('usertypeID');        
        $user->save();

        return response()->json(array(
            'message' => 'update a password successfully', 
            'status' => 'true'));
    }*/
    
              
}
