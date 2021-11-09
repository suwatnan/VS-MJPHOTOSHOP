<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\formatss;
use Illuminate\Http\Request;

class formatssController extends Controller
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
            $formatss = formatss::where('formatID', 'LIKE', "%$keyword%")
                ->orWhere('formatname', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $formatss = formatss::latest()->paginate($perPage);
        }

        return view('admin.formatss.index', compact('formatss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.formatss.create');
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
        
        formatss::create($requestData);

        return redirect('admin/formatss')->with('flash_message', 'formatss added!');
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
        $formatss = formatss::findOrFail($id);

        return view('admin.formatss.show', compact('formatss'));
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
        $formatss = formatss::findOrFail($id);

        return view('admin.formatss.edit', compact('formatss'));
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
        
        $formatss = formatss::findOrFail($id);
        $formatss->update($requestData);

        return redirect('admin/formatss')->with('flash_message', 'formatss updated!');
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
        formatss::destroy($id);

        return redirect('admin/formatss')->with('flash_message', 'formatss deleted!');
    }
}
