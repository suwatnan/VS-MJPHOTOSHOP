<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\printphoto;
use Illuminate\Http\Request;
use DB;

class printphotoController extends Controller
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
            $printphoto = printphoto::where('printphotoID', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('userID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $printphoto = printphoto::latest()->paginate($perPage);
        }

        return view('admin.printphoto.index', compact('printphoto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.printphoto.create');
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
        
        printphoto::create($requestData);

        return redirect('admin/printphoto')->with('flash_message', 'printphoto added!');
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
        $printphoto = printphoto::findOrFail($id);

        return view('admin.printphoto.show', compact('printphoto'));
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
        $printphoto = printphoto::findOrFail($id);

        return view('admin.printphoto.edit', compact('printphoto'));
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
        
        $requestData = $request->all();
        $printphoto = printphoto::findOrFail($id);
        $printphoto->update($requestData);

        $payment = DB::table('payment')
        ->where('payment.printphotoID', $id)->limit(1);
        $payment->update(['comment' => $requestData['comment']]);

        return redirect('admin/printphotodetail')->with('flash_message', 'printphoto updated!');
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
        printphoto::destroy($id);

        return redirect('admin/printphoto')->with('flash_message', 'printphoto deleted!');
    }
}
