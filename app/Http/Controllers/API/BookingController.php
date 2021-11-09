<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use DB;

class BookingController extends Controller
{
    public function addbooking(Request $request)
    {
        $time1 = $request->get('timeID');
        $date1 = $request->get('date');
        $sql = "SELECT COUNT(bookingID) as queues1 FROM booking WHERE timeID = $time1 AND date = '$date1' ";
        $chang = DB::select($sql)[0];
        if($chang ->queues1 >= 5){
            return response()->json(array());  
        }
        else{
            $chang1 = $chang ->queues1 +  1;
            //add booking data into booking table
            $booking = new Booking();
            $booking->date = $request->get("date"); 
            $booking->queues = $chang1;
            $booking->formatID = $request->get('formatID');        
            $booking->timeID = $request->get('timeID');
            $booking->receivingID = $request->get('receivingID');
            $booking->note = $request->get('note');
            $booking->userID = $request->get('userID');           
            $booking->save();
           
        }
       
    }

    public function viewbooking($id)
    {
        $sql="SELECT booking.bookingID,booking.date,booking.formatID,booking.timeID,booking.note,booking.userID,booking.receivingID,receiving.receivingname,booking.queues,timess.duration,formatss.formatname,users.firstname,users.lastname,booking.status,booking.statuspayment FROM booking 
        INNER JOIN timess ON booking.timeID = timess.timeID
        INNER JOIN formatss ON booking.formatID = formatss.formatID
        INNER JOIN users ON booking.userID = users.userID
        INNER JOIN receiving ON booking.receivingID = receiving.receivingID
        WHERE booking.userID = $id AND (booking.status = 0 or booking.status = 1 or booking.status = 2 or booking.status = 4) 
        GROUP BY booking.bookingID,booking.date,booking.formatID,booking.timeID,booking.note,booking.userID,booking.receivingID,receiving.receivingname,booking.queues,timess.duration,formatss.formatname,users.firstname,users.lastname,booking.status,booking.statuspayment";
        $booking=DB::select($sql);         
        return response()->json($booking);
    }

    public function viewhistory($id)
    {
        $sql="SELECT booking.bookingID,booking.date,booking.formatID,booking.timeID,booking.note,booking.userID,booking.receivingID,receiving.receivingname,booking.queues,timess.duration,formatss.formatname,users.firstname,users.lastname,booking.status,booking.statuspayment FROM booking 
        INNER JOIN timess ON booking.timeID = timess.timeID
        INNER JOIN formatss ON booking.formatID = formatss.formatID
        INNER JOIN users ON booking.userID = users.userID
        INNER JOIN receiving ON booking.receivingID = receiving.receivingID
        WHERE booking.userID = $id AND booking.status = 3  
        GROUP BY booking.bookingID,booking.date,booking.formatID,booking.timeID,booking.note,booking.userID,booking.receivingID,receiving.receivingname,booking.queues,timess.duration,formatss.formatname,users.firstname,users.lastname,booking.status,booking.statuspayment";
        $booking=DB::select($sql);         
        return response()->json($booking);
    }


    public function deletebooking($id)
    {
        //hard delete
        $booking = Booking::find($id);
        $booking->delete();

        //soft delete
        return response()->json(array(
            'message' => 'delete a booking successfully', 
            'status' => 'true'));
    }  
    public function q(Request $request)
    {
        $time1 = $request->get('timeID');
        $date1 = $request->get('date');
        $sql = "SELECT COUNT(bookingID) as queues1 FROM booking WHERE timeID = $time1 AND date = '$date1' ";
        $chang = DB::select($sql)[0];
        return response()->json($chang);
    }

    public function up($bookingID)
    {
        $booking = Booking::find($bookingID);
        $booking->status = 1;
        $booking->save();
        
        return response()->json(array(
            'message' => 'delete a booking successfully', 
            'status' => 'true'));

    }
}