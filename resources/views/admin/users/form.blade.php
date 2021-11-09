<?php $parts = DB::connection('mysql')->select('select * from user_type');?> 

<div class="form-group {{ $errors->has('usertypeID') ? 'has-error' : ''}}">
   <label for="usertypeID" class="control-label">{{ 'usertypeID' }}</label>
   <select class="form-control" name="usertypeID" id="usertypeID">
           <option value="{{ isset($user->usertypeID) ? $user->usertypeID : ''}}">{{ isset($user->usertypeID) ? $user->usertypeID : ''}}</option>
           @foreach($parts as $row)
           	<option value="{{$row->usertypeID}}">{{$row->user_type}}</option>
           @endforeach    
   </select>
   {!! $errors->first('usertypeID', '<p class="help-block">:message</p>') !!}
</div>



<!--<div class="form-group {{ $errors->has('usertypeID') ? 'has-error' : ''}}">
    <label for="usertypeID" class="control-label">{{ 'Usertypeid' }}</label>
    <input class="form-control" name="usertypeID" type="number" id="usertypeID" value="{{ isset($user->usertypeID) ? $user->usertypeID : ''}}" >
    {!! $errors->first('usertypeID', '<p class="help-block">:message</p>') !!}
</div>
<!-->



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
