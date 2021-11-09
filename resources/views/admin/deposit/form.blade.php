
<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <label for="comment" class="control-label">{{ 'ค้างชำระ' }}</label>
    <input class="form-control" name="comment" type="text" id="comment" value="{{ isset($deposit->comment) ? $deposit->comment : ''}}" >
    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
