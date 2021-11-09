<?php $parts = DB::connection('mysql')->select('select * from timess');?> 

<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'สถานะการทำงาน' }}</label>
    <!--<input class="form-control" name="status" type="number" id="status" value="{{ isset($booking->status) ? $booking->status : ''}}" >-->

    <select class="form-control" name="status" id="status">
           <option value="{{ isset($booking->status) ? $booking->status : ''}}">{{ isset($booking->status) ? $booking->status : ''}}</option>
            <option value="0">0 ชำระค่ามัดจำ</option>
            <option value="1">1 ตรวจสอบใบเสร็จ</option>
            <option value="2">2 รอดำเนินการ</option>
            <option value="3">3 ถ่ายสำเร็จ</option>
            <option value="4">4 ชำระเงินไม่สำเร็จ</option>
            
            
   </select>
   

    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('statuspayment') ? 'has-error' : ''}}">
    <label for="statuspayment" class="control-label">{{ 'สถานะการชำระเงิน' }}</label>
    <!--<input class="form-control" name="statuspayment" type="number" id="statuspayment" value="{{ isset($booking->statuspayment) ? $booking->statuspayment : ''}}" >-->
    <select class="form-control" name="statuspayment" id="statuspayment">
           <option value="{{ isset($booking->statuspayment) ? $booking->statuspayment : ''}}">{{ isset($booking->statuspayment) ? $booking->statuspayment : ''}}</option>
            <option value="0">0 ชำระหลังการถ่าย</option>
            <option value="1">1 ชำระเงินครบแล้ว</option>
      
   </select>
    {!! $errors->first('statuspayment', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
