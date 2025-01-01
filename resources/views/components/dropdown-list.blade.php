<div class="col-xl-{{$xl}} col-lg-{{$lg}} col-md-{{$md}} col-sm-{{$sm}} col-12 {{$parentClass}}">
	<label for="{{$idName}}" class="form-label">{{$caption}}</label>
	<select class="form-control @error($idName)is-invalid @enderror" id="{{$idName}}" name="{{$idName}}" {{$extraAttribute}} {{$multi?'multiple':''}}>
		@if($placeholder)
		<option value="">{{$placeholder}}</option>
		@endif
		@foreach($values as $key => $value )
			<option value="{{$key}}" {{($multi?(in_array($key,$initValue)):$initValue == $key)?'selected':''}}>{{$value}}</option>
		@endforeach
	</select>
	@error($idName)
		<div id="validation-{{$idName}}" class="invalid-feedback">
			{{$errors->first($idName)}}
		</div>
	@enderror
</div>