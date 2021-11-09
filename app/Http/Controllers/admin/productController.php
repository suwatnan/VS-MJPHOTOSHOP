<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\product;
use Illuminate\Http\Request;

class productController extends Controller
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
            $product = product::where('productID', 'LIKE', "%$keyword%")
                ->orWhere('imageFileName', 'LIKE', "%$keyword%")
                ->orWhere('productname', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = product::latest()->paginate($perPage);
        }

        return view('admin.product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.product.create');
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
            //'productID'    =>  'required',
            'imageFileName'         =>  'required|max:2048',
            'productname'         =>  'required',
            'size'         =>  'required',
            'price'         =>  'required',
            'quantity'         =>  'required',
        
        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
           //'productID'       =>   $request->productID,
            'imageFileName'            =>   $new_name,
            'productname'        =>   $request->productname,
            'size'        =>   $request->size,
            'price'        =>   $request->price,
            'quantity'        =>   $request->quantity,
   
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Product::create($form_data);
       
        return redirect('admin/product')->with('flash_message', 'Product added!');
 
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
        $product = product::findOrFail($id);

     


        return view('admin.product.show', compact('product'));
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
        $product = product::findOrFail($id);

        return view('admin.product.edit', compact('product'));
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
            //'productID'    =>  'required',
            'imageFileName'         =>  'required|max:2048',
            'productname'         =>  'required',
            'size'         =>  'required',
            'price'         =>  'required',
            'quantity'         =>  'required',

        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'productID'       =>   $request->productID,
            'imageFileName'            =>   $new_name,
            'productname'        =>   $request->productname,
            'size'        =>   $request->size,
            'price'        =>   $request->price,
            'quantity'        =>   $request->quantity,
            
        );
       
        $product = Product::findOrFail($id);
        $product->update($form_data);
 
        return redirect('admin/product')->with('flash_message', 'Product updated!');
 
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
        product::destroy($id);

        return redirect('admin/product')->with('flash_message', 'product deleted!');
    }
}
