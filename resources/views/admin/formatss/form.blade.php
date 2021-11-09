
<div class="form-group {{ $errors->has('formatname') ? 'has-error' : ''}}">
    <label for="formatname" class="control-label">{{ 'Formatname' }}</label>
    <input class="form-control" name="formatname" type="text" id="formatname" value="{{ isset($formatss->formatname) ? $formatss->formatname : ''}}" >
    {!! $errors->first('formatname', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
