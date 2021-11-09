
<div class="form-group {{ $errors->has('formatprint') ? 'has-error' : ''}}">
    <label for="formatprint" class="control-label">{{ 'Formatprint' }}</label>
    <input class="form-control" name="formatprint" type="text" id="formatprint" value="{{ isset($formatprint->formatprint) ? $formatprint->formatprint : ''}}" >
    {!! $errors->first('formatprint', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('imageFileName') ? 'has-error' : ''}}">
    <label for="imageFileName" class="control-label">{{ 'Imagefilename' }}</label>
    <input class="form-control" name="imageFileName" type="file" id="imageFileName" value="{{ isset($formatprint->imageFileName) ? $formatprint->imageFileName : ''}}" >
    {!! $errors->first('imageFileName', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
