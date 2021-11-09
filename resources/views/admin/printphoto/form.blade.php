
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'สถานะการทำงาน' }}</label>
    <!--<input class="form-control" name="status" type="number" id="status" value="{{ isset($printphoto->status) ? $printphoto->status : ''}}" > -->

    <select class="form-control" name="status" id="status">
           <option value="{{ isset($printphoto->status) ? $printphoto->status : ''}}">{{ isset($printphoto->status) ? $printphoto->status : ''}}</option>
            <option value="0">รอการชำระเงิน</option>
            <option value="1">ตรวจสอบใบเสร็จ</option>
            <option value="2">กำลังจัดส่ง</option>
            <option value="3">สินค้าถึงแล้ว</option>
            <option value="4">รับสินค้า</option>
            <option value="5">ชำระเงินไม่สำเร็จ</option>
   </select>

    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'ค้างชำระ' }}</label>
    <input class="form-control" name="comment" type="text" id="comment" value="" >
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
