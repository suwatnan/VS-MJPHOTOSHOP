<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\user;
use Illuminate\Http\Request;
use DB;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

     /*
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = user::where('user', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('firstname', 'LIKE', "%$keyword%")
                ->orWhere('lastname', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('imageileame', 'LIKE', "%$keyword%")
                ->orWhere('usertypeID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = user::latest()->paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }
    */

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = DB::table('users')
                ->join('user_type', 'users.usertypeID', '=', 'user_type.usertypeID')
                ->where('users.userID', 'LIKE', "%$keyword%")
                ->orWhere('users.username', 'LIKE', "%$keyword%")
                ->orWhere('users.password', 'LIKE', "%$keyword%")
                ->orWhere('users.firstname', 'LIKE', "%$keyword%")
                ->orWhere('users.lastname', 'LIKE', "%$keyword%")
                ->orWhere('users.address', 'LIKE', "%$keyword%")
                ->orWhere('users.email', 'LIKE', "%$keyword%")
                ->orWhere('users.phone', 'LIKE', "%$keyword%")
                ->orWhere('users.usertypeID', 'LIKE', "%$keyword%")
                ->select('users.*', 'user_type.user_type')
                ->orderBy('users.userID', 'asc')
                ->paginate($perPage);
        } else {
            $users = DB::table('users')
                ->join('user_type', 'users.usertypeID', '=', 'user_type.usertypeID')
                ->select('users.*', 'user_type.user_type')
                ->orderBy('users.userID', 'asc')
                ->paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        user::create($requestData);

        return redirect('admin/users')->with('flash_message', 'user added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */

     /*
    public function show($id)
    {
        $user = user::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }
    */

    public function show($id)
    {   
        //dd($id);
        $user = DB::table('users')
        ->join('user_type', 'users.usertypeID', '=', 'user_type.usertypeID')
        ->where('users.userID', $id)
        ->first();

       

        //dd($user);
    
        
        //->get();

        return view('admin.users.show', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = user::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
    
        
        $user = user::find($id);
        //$user->firstname = $request->get('firstname');
        //$user->lastname = $request->get('lastname');        
        //$user->username = $request->get('username');
        //$user->password = $request->get('password');
        //$user->address = $request->get('address');
        //$user->phone = $request->get('phone');
        //$user->email = $request->get('email');
        //$user->lineID = $request->get('lineID');
        $user->usertypeID = $request->get('usertypeID');       
        $user->save();

        return redirect('admin/users')->with('flash_message', 'user updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        user::destroy($id);

        return redirect('admin/users')->with('flash_message', 'user deleted!');
    }
}
