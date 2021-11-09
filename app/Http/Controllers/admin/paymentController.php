<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\payment;
use Illuminate\Http\Request;

class paymentController extends Controller
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
            $payment = payment::where('paymentID', 'LIKE', "%$keyword%")
                ->orWhere('printphotoID', 'LIKE', "%$keyword%")
                ->orWhere('imagebill', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $payment = payment::latest()->paginate($perPage);
        }

        return view('admin.payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.payment.create');
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
                'paymentID'    =>  'required',
                'printphotoID'         =>  'required',
                'imagebill'         =>  'required|image|max:2048',
                'comment'       =>  'required',
                
            ]);
           
            $image = $request->file('imagebill');
     
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $form_data = array(
                'paymentID'       =>   $request->paymentID,
                'printphotoID'        =>   $request->printphotoID,
                'imagebill'        =>    $new_name,
                'comment'        =>   $request->comment,
            );
           
            /*
            $requestData = $request->all();
            $image = $request->file('imageFileName');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image);
            */
            Payment::create($form_data);
           
            return redirect('admin/payment')->with('flash_message', 'payment 
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
        $payment = payment::findOrFail($id);

        return view('admin.payment.show', compact('payment'));
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
        $payment = payment::findOrFail($id);

        return view('admin.payment.edit', compact('payment'));
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
            //'paymentID'    =>  'required',
            //'printphotoID'         =>  'required',
            //'imagebill'         =>  'required|image|max:2048',
            'comment'    =>  'required',
        ]);
       
        $image = $request->file('imagebill');
 
        //$new_name = rand() . '.' . $image->getClientOriginalExtension();
        //$image->move(public_path('images'), $new_name);
        $form_data = array(
           // 'paymentID'       =>   $request->paymentID,
           // 'printphotoID'        =>   $request->printphotoID,
           // 'imagebill'        =>    $new_name,
            'comment'        =>   $request->comment,
           
        );
        $paymen = Payment::findOrFail($id);
        $paymen->update($form_data);
 

        return redirect('admin/payment')->with('flash_message', 'payment updated!');
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
        payment::destroy($id);

        return redirect('admin/payment')->with('flash_message', 'payment deleted!');
    }
}
