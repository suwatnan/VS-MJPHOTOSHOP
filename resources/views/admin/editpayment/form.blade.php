<!--<div class="form-group {{ $errors->has('editpaymentID') ? 'has-error' : ''}}">
    <label for="editpaymentID" class="control-label">{{ 'Editpaymentid' }}</label>
    <input class="form-control" name="editpaymentID" type="number" id="editpaymentID" value="{{ isset($editpayment->editpaymentID) ? $editpayment->editpaymentID : ''}}" >
    {!! $errors->first('editpaymentID', '<p class="help-block">:message</p>') !!}
</div>-->
<div class="form-group {{ $errors->has('imagebill2') ? 'has-error' : ''}}">
    <label for="imagebill2" class="control-label">{{ 'Imagebill2' }}</label>
    <input class="form-control" name="imagebill2" type="file" id="imagebill2" value="{{ isset($editpayment->imagebill2) ? $editpayment->imagebill2 : ''}}" >
    {!! $errors->first('imagebill2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('printphotoID') ? 'has-error' : ''}}">
    <label for="printphotoID" class="control-label">{{ 'Printphotoid' }}</label>
    <input class="form-control" name="printphotoID" type="number" id="printphotoID" value="{{ isset($editpayment->printphotoID) ? $editpayment->printphotoID : ''}}" >
    {!! $errors->first('printphotoID', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
