<?php $parts = DB::connection('mysql')->select('select * from sizeimage');?> 

<div class="form-group {{ $errors->has('imageFileName') ? 'has-error' : ''}}">
    <label for="imageFileName" class="control-label">{{ 'Imagefilename' }}</label>
    <input class="form-control" name="imageFileName" type="file" id="imageFileName" value="{{ isset($product->imageFileName) ? $product->imageFileName : ''}}" >
    {!! $errors->first('imageFileName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('productname') ? 'has-error' : ''}}">
    <label for="productname" class="control-label">{{ 'Productname' }}</label>
    <input class="form-control" name="productname" type="text" id="productname" value="{{ isset($product->productname) ? $product->productname : ''}}" >
    {!! $errors->first('productname', '<p class="help-block">:message</p>') !!}
</div>

<!--
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Size' }}</label>
    <input class="form-control" name="size" type="text" id="size" value="{{ isset($product->size) ? $product->size : ''}}" >
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>
-->

<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Size' }}</label>
    <select class="form-control" name="size" id="size">
           <option value="{{ isset($product->size) ? $product->size : ''}}">{{ isset($product->size) ? $product->size : ''}}</option>
           @foreach($parts as $row)
           	<option value="{{$row->size}}">{{$row->size}}</option>
           @endforeach    
   </select>    
   {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($product->price) ? $product->price : ''}}" >
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($product->quantity) ? $product->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
