<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\deposit;
use Illuminate\Http\Request;
use DB;
class depositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $deposit = deposit::where('depositID', 'LIKE', "%$keyword%")
                ->orWhere('imagedeposit', 'LIKE', "%$keyword%")
                ->orWhere('imagedeposit2', 'LIKE', "%$keyword%")
                ->orWhere('comment', 'LIKE', "%$keyword%")
                ->orWhere('bookingID', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $deposit = deposit::latest()->paginate($perPage);
        }

        return view('admin.deposit.index', compact('deposit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.deposit.create');
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
        

        $request->validate([
            'depositID  '    =>  'required',
            'imagedeposit'         =>  'required|image|max:2048',
            'imagedeposit2'         =>  'required|image|max:2048',
            'comment'         =>  'required',
         'bookingID '         =>  'required',
          
            
        ]);
       
        $image = $request->file('imagedeposit');
        $image = $request->file('imagedeposit2');
 
       $new_name = rand() . '.' . $image->getClientOriginalExtension();
       $image->move(public_path('images'), $new_name);
        $form_data = array(
            'depositID'       =>   $request->depositID,
            'imagedeposit'        =>    $new_name,
            'imagedeposit2'        =>    $new_name,
            'comment'        =>   $request->comment,
            'bookingID'        =>   $request->bookingID,
            
            
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Editpayment::create($form_data);
       
        return redirect('admin/deposit')->with('flash_message', 'deposit 
    added!');

    

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $deposit = deposit::findOrFail($id);

        return view('admin.deposit.show', compact('deposit'));
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
        $deposit = deposit::findOrFail($id);

        return view('admin.deposit.edit', compact('deposit'));
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
        
        
        $request->validate([
            //'depositID  '    =>  'required',
           //'imagedeposit'         =>  'required|image|max:2048',
           //'imagedeposit2'         =>  'required|image|max:2048', 
            //'bookingID '         =>  'required',
            'comment'    =>  'required',
            
        ]);
        
        //$image = $request->file('imagedeposit');
        //$image = $request->file('imagedeposit2');
 
       // $new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('images'), $new_name);
       $form_data = array(
            //'depositID'       =>   $request->depositID,
           //'imagedeposit'        =>    $new_name,
            //'imagedeposit2'        =>    $new_name,
            //'bookingID'        =>   $request->bookingID,
            'comment'        =>   $request->comment,
            
        );
        
        $deposit = Deposit::findOrFail($id);
        $deposit->update($form_data);
 
        return redirect('admin/deposit')->with('flash_message', 'deposit updated!');


        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Editpayment::create($form_data);
       
        return redirect('admin/deposit')->with('flash_message', 'deposit 
        updated!');

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
        deposit::destroy($id);

        return redirect('admin/deposit')->with('flash_message', 'deposit deleted!');
    }
}
