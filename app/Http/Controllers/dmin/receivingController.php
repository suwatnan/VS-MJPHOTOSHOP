<?php

namespace App\Http\Controllers\dmin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\receiving;
use Illuminate\Http\Request;

class receivingController extends Controller
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
            $receiving = receiving::where('receiving', 'LIKE', "%$keyword%")
                ->orWhere('receivingname', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $receiving = receiving::latest()->paginate($perPage);
        }

        return view('admin.receiving.index', compact('receiving'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.receiving.create');
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
        
        receiving::create($requestData);

        return redirect('admin/receiving')->with('flash_message', 'receiving added!');
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
        $receiving = receiving::findOrFail($id);

        return view('admin.receiving.show', compact('receiving'));
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
        $receiving = receiving::findOrFail($id);

        return view('admin.receiving.edit', compact('receiving'));
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
        
        $receiving = receiving::findOrFail($id);
        $receiving->update($requestData);

        return redirect('admin/receiving')->with('flash_message', 'receiving updated!');
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
        receiving::destroy($id);

        return redirect('admin/receiving')->with('flash_message', 'receiving deleted!');
    }
}
