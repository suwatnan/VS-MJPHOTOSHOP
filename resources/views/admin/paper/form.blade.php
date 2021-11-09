
<div class="form-group {{ $errors->has('papername') ? 'has-error' : ''}}">
    <label for="papername" class="control-label">{{ 'Papername' }}</label>
    <input class="form-control" name="papername" type="text" id="papername" value="{{ isset($paper->papername) ? $paper->papername : ''}}" >
    {!! $errors->first('papername', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($paper->quantity) ? $paper->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
