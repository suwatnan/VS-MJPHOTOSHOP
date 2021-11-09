<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\editdeposit;
use Illuminate\Http\Request;

class editdepositController extends Controller
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
            $editdeposit = editdeposit::where('editdepositID', 'LIKE', "%$keyword%")
                ->orWhere('imagedeposit', 'LIKE', "%$keyword%")
                ->orWhere('bookingID', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $editdeposit = editdeposit::latest()->paginate($perPage);
        }

        return view('admin.editdeposit.index', compact('editdeposit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.editdeposit.create');
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
        
        editdeposit::create($requestData);

        return redirect('admin/editdeposit')->with('flash_message', 'editdeposit added!');
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
        $editdeposit = editdeposit::findOrFail($id);

        return view('admin.editdeposit.show', compact('editdeposit'));
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
        $editdeposit = editdeposit::findOrFail($id);

        return view('admin.editdeposit.edit', compact('editdeposit'));
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
        
        $editdeposit = editdeposit::findOrFail($id);
        $editdeposit->update($requestData);

        return redirect('admin/editdeposit')->with('flash_message', 'editdeposit updated!');
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
        editdeposit::destroy($id);

        return redirect('admin/editdeposit')->with('flash_message', 'editdeposit deleted!');
    }
}
