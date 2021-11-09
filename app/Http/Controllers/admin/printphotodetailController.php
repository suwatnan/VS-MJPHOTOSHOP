<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\printphotodetail;
use Illuminate\Http\Request;
use DB;

class printphotodetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

     
    /*public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $printphotodetail = printphotodetail::where('printphotodetailID', 'LIKE', "%$keyword%")
                ->orWhere('imageFileName', 'LIKE', "%$keyword%")
                ->orWhere('sizeimageID', 'LIKE', "%$keyword%")
                ->orWhere('formatprintID', 'LIKE', "%$keyword%")
                ->orWhere('productID', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('paperID', 'LIKE', "%$keyword%")
                ->orWhere('totalprice', 'LIKE', "%$keyword%")
                ->orWhere('printphotoID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $printphotodetail = printphotodetail::latest()->paginate($perPage);
        }

        return view('admin.printphotodetail.index', compact('printphotodetail'));
    }*/
    


    public function index(Request $request)
    {
            $perPage = 25;

            $printphotodetail = DB::table('printphotodetail')
            ->join('printphoto', 'printphotodetail.printphotoID', '=', 'printphoto.printphotoID')
            ->join('users', 'printphoto.userID', '=', 'users.userID')
            ->join('payment', 'printphoto.printphotoID', '=', 'payment.printphotoID')
            ->select('printphotodetail.*', 'payment.imagebill','users.firstname','users.lastname', 'printphoto.status')
            ->orderBy('printphotodetail.printphotodetailID', 'asc')
            ->paginate($perPage);
            //dd($printphotodetail);
        

        return view('admin.printphotodetail.index', compact('printphotodetail'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.printphotodetail.create');
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
            'printphotodetailID '    =>  'required',
            'imageFileName'         =>  'required|image|max:2048',
            'sizeimageID'         =>  'required',
            'formatprintID'         =>  'required',
            'productID'         =>  'required',
            'note'         =>  'required',
            'paperID'         =>  'required',
            'totalprice'         =>  'required',
            'printphotoID'         =>  'required',
            
        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'printphotodetailID'       =>   $request->printphotodetailID,
             'imageFileName'        =>    $new_name,
             'sizeimageID'        =>   $request->sizeimageID,
             'formatprintID'        =>   $request->formatprintID,
             'productID'        =>   $request->productID,
             'note'        =>   $request->note,
             'paperID'        =>   $request->paperID,
             'totalprice'        =>   $request->totalprice,
             'printphotoID'        =>   $request->printphotoID,
            
           
            
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Printphotodetail::create($form_data);
       
        return redirect('admin/printphotodetail')->with('flash_message', ' printphotodetail added!'); 
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
        $printphotodetail = DB::table('printphotodetail')
        ->join('printphoto', 'printphotodetail.printphotoID', '=', 'printphoto.printphotoID')
        ->join('users', 'printphoto.userID', '=', 'users.userID')
        ->join('payment', 'printphoto.printphotoID', '=', 'payment.printphotoID')
        ->join('sizeimage', 'printphotodetail.sizeimageID', '=', 'sizeimage.sizeimageID')
        ->join('formatprint', 'printphotodetail.formatprintID', '=', 'formatprint.formatprintID')
        ->join('product', 'printphotodetail.productID', '=', 'product.productID')
        ->join('paper', 'printphotodetail.paperID', '=', 'paper.paperID')
        ->where('printphotodetail.printphotodetailID', $id)
        ->select('printphotodetail.*', 'payment.imagebill', 'sizeimage.size', 'formatprint.formatprint', 'product.productname', 'paper.papername','users.firstname','users.lastname', 'printphoto.status', 'payment.comment')      
        ->first();

        //dd($printphotodetail);

        return view('admin.printphotodetail.show', compact('printphotodetail'));
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
        $printphotodetail = printphotodetail::findOrFail($id);

        return view('admin.printphotodetail.edit', compact('printphotodetail'));
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
            'printphotodetailID '    =>  'required',
            'imageFileName'         =>  'required|image|max:2048',
            'sizeimageID'         =>  'required',
            'formatprintID'         =>  'required',
            'productID'         =>  'required',
            'note'         =>  'required',
            'paperID'         =>  'required',
            'totalprice'         =>  'required',
            'printphotoID'         =>  'required',
            
        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'printphotodetailID'       =>   $request->printphotodetailID,
             'imageFileName'        =>    $new_name,
             'sizeimageID'        =>   $request->sizeimageID,
             'formatprintID'        =>   $request->formatprintID,
             'productID'        =>   $request->productID,
             'note'        =>   $request->note,
             'paperID'        =>   $request->paperID,
             'totalprice'        =>   $request->totalprice,
             'printphotoID'        =>   $request->printphotoID,
            
           
            
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Printphotodetail::create($form_data);
       
        return redirect('admin/printphotodetail')->with('flash_message', ' printphotodetail updated!'); 
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
        printphotodetail::destroy($id);

        return redirect('admin/printphotodetail')->with('flash_message', 'printphotodetail deleted!');
    }
}
