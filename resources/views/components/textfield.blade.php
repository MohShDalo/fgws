<div class="col-xl-{{$xl}} col-lg-{{$lg}} col-md-{{$md}} col-sm-{{$sm}} col-12 {{$parentClass}}">
	<label for="{{$idName}}" class="form-label">{{$caption}}</label>
	<input type="{{$type}}" class="form-control @error($idName)is-invalid @enderror" id="{{$idName}}" placeholder="{{$placeholder}}"
		name="{{$idName}}" value="{{$initValue}}" {{$extraAttribute}}  >
	@if($hint)
		<div class="hint">{{$hint}}</div>
	@endif
	@error($idName)
		<div id="validation-{{$idName}}" class="invalid-feedback">
			{{$errors->first($idName)}}
		</div>
	@enderror
</div>