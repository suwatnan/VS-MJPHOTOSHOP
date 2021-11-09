<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\editpayment;
use Illuminate\Http\Request;

class editpaymentController extends Controller
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
            $editpayment = editpayment::where('editpaymentID', 'LIKE', "%$keyword%")
                ->orWhere('imagebill2', 'LIKE', "%$keyword%")
                ->orWhere('printphotoID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $editpayment = editpayment::latest()->paginate($perPage);
        }

        return view('admin.editpayment.index', compact('editpayment'));
    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.editpayment.create');
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
            'editpaymentID '    =>  'required',
            'imagebill2'         =>  'required|image|max:2048',
            'printphotoID'         =>  'required',
          
            
        ]);
       
        $image = $request->file('imagebill2');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'editpaymentID'       =>   $request->paymentID,
            'imagebill2'        =>    $new_name,
            'printphotoID'        =>   $request->printphotoID,
            
            
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Editpayment::create($form_data);
       
        return redirect('admin/editpayment')->with('flash_message', 'editpayment 
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
        $editpayment = editpayment::findOrFail($id);

        return view('admin.editpayment.show', compact('editpayment'));
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
        $editpayment = editpayment::findOrFail($id);

        return view('admin.editpayment.edit', compact('editpayment'));
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
            'editpaymentID '    =>  'required',
            'imagebill2'         =>  'required|image|max:2048',
            'printphotoID'         =>  'required',
          
            
        ]);
       
        $image = $request->file('imagebill2');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'editpaymentID'       =>   $request->paymentID,
            'imagebill2'        =>    $new_name,
            'printphotoID'        =>   $request->printphotoID,
            
            
        );
       
        $editpayment = editpayment::findOrFail($id);
        $editpayment->update($form_data);
        Editpayment::create($form_data);
       
        return redirect('admin/editpayment')->with('flash_message', 'editpayment 
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
        editpayment::destroy($id);

        return redirect('admin/editpayment')->with('flash_message', 'editpayment deleted!');
    }
}
