<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Booking;
use Illuminate\Http\Request;
use DB;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    /*
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $booking = Booking::where('bookingID', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('formatID', 'LIKE', "%$keyword%")
                ->orWhere('timeID', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('userID', 'LIKE', "%$keyword%")
                ->orWhere('queues', 'LIKE', "%$keyword%")
                ->orWhere('receivingID', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('statuspayment', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $booking = Booking::latest()->paginate($perPage);
        }

        return view('admin.booking.index', compact('booking'));
    }
 */
public function index(Request $request)
{
    $keyword = $request->get('search');
    $perPage = 25;
    if (!empty($keyword)) {
    $booking = DB::table('booking')
            ->join('timess', 'booking.timeID', '=', 'timess.timeID')
            ->join('formatss', 'booking.formatID', '=', 'formatss.formatID')
            ->where('booking.bookingID', 'LIKE', "%$keyword%")
            ->orWhere(' booking.date', 'LIKE', "%$keyword%")
            ->orWhere(' booking.formatID', 'LIKE', "%$keyword%")
            ->orWhere(' booking.timeID', 'LIKE', "%$keyword%")
            ->orWhere(' booking.note', 'LIKE', "%$keyword%")
            ->orWhere(' booking.userID', 'LIKE', "%$keyword%")
            ->orWhere(' booking.queues', 'LIKE', "%$keyword%")
            ->orWhere(' booking.receivingID', 'LIKE', "%$keyword%")
            ->orWhere(' booking.status', 'LIKE', "%$keyword%")
            ->select('booking.*', 'timess.duration', 'formatss.formatname')
            ->orderBy('booking.bookingID', 'asc')
            ->paginate($perPage);

    } else {
        $booking = DB::table('booking')
            ->join('timess', 'booking.timeID', '=', 'timess.timeID')
            ->join('formatss', 'booking.formatID', '=', 'formatss.formatID')
            ->select('booking.*', 'timess.duration', 'formatss.formatname')
            ->orderBy('booking.bookingID', 'asc')
            ->paginate($perPage);
    }
    return view('admin.booking.index', compact('booking'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.booking.create');
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
        
        Booking::create($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking added!');
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
        //dd($id);
        $booking = DB::table('booking')
        ->join('timess', 'booking.timeID', '=', 'timess.timeID')
       ->join('formatss', 'booking.formatID', '=', 'formatss.formatID')
        ->where('booking.bookingID', $id)
        ->first();

        //dd($user);
    
        
        //->get();

        return view('admin.booking.show', compact('booking'));
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
        $booking = Booking::findOrFail($id);

        return view('admin.booking.edit', compact('booking'));
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
        
        $booking = Booking::findOrFail($id);
        $booking->update($requestData);

        return redirect('admin/booking')->with('flash_message', 'Booking updated!');
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
        Booking::destroy($id);

        return redirect('admin/booking')->with('flash_message', 'Booking deleted!');
    }
}
