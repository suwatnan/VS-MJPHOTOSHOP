<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\formatprint;
use Illuminate\Http\Request;

class formatprintController extends Controller
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
            $formatprint = formatprint::where('formatprintID', 'LIKE', "%$keyword%")
                ->orWhere('formatprint', 'LIKE', "%$keyword%")
                ->orWhere('imageFileName', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $formatprint = formatprint::latest()->paginate($perPage);
        }

        return view('admin.formatprint.index', compact('formatprint'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.formatprint.create');
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
            //'formatprintID '    =>  'required',
            'formatprint'         =>  'required',
            'imageFileName'         =>  'required|image|max:2048',
            
        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            //'formatprintID'       =>   $request->formatprintID,
            'formatprint'        =>   $request->formatprint,
            'imageFileName'        =>    $new_name,
            
        );
       
        /*
        $requestData = $request->all();
        $image = $request->file('imageFileName');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $image);
        */
        Formatprint::create($form_data);
       
        return redirect('admin/formatprint')->with('flash_message', 'formatprint added!'); 
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
        $formatprint = formatprint::findOrFail($id);

        return view('admin.formatprint.show', compact('formatprint'));
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
        $formatprint = formatprint::findOrFail($id);

        return view('admin.formatprint.edit', compact('formatprint'));
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
            //'formatprintID '    =>  'required',
            'formatprint'         =>  'required',
            'imageFileName'         =>  'required|image|max:2048',
            
        ]);
       
        $image = $request->file('imageFileName');
 
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            //'formatprintID'       =>   $request->formatprintID,
            'formatprint'        =>   $request->formatprint,
            'imageFileName'        =>    $new_name,
            
        );

        $formatprint = Formatprint::findOrFail($id);
        $formatprint->update($form_data);
 

    return redirect('admin/formatprint')->with('flash_message', 'formatprint updated!');
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
        formatprint::destroy($id);

        return redirect('admin/formatprint')->with('flash_message', 'formatprint deleted!');
    }
}
