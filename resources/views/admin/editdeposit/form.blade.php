<div class="form-group {{ $errors->has('editdepositID') ? 'has-error' : ''}}">
    <label for="editdepositID" class="control-label">{{ 'Editdepositid' }}</label>
    <input class="form-control" name="editdepositID" type="number" id="editdepositID" value="{{ isset($editdeposit->editdepositID) ? $editdeposit->editdepositID : ''}}" >
    {!! $errors->first('editdepositID', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('imagedeposit') ? 'has-error' : ''}}">
    <label for="imagedeposit" class="control-label">{{ 'Imagedeposit' }}</label>
    <input class="form-control" name="imagedeposit" type="text" id="imagedeposit" value="{{ isset($editdeposit->imagedeposit) ? $editdeposit->imagedeposit : ''}}" >
    {!! $errors->first('imagedeposit', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('bookingID') ? 'has-error' : ''}}">
    <label for="bookingID" class="control-label">{{ 'Bookingid' }}</label>
    <input class="form-control" name="bookingID" type="number" id="bookingID" value="{{ isset($editdeposit->bookingID) ? $editdeposit->bookingID : ''}}" >
    {!! $errors->first('bookingID', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
