
<div class="form-group {{ $errors->has('receivingname') ? 'has-error' : ''}}">
    <label for="receivingname" class="control-label">{{ 'Receivingname' }}</label>
    <input class="form-control" name="receivingname" type="text" id="receivingname" value="{{ isset($receiving->receivingname) ? $receiving->receivingname : ''}}" >
    {!! $errors->first('receivingname', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
