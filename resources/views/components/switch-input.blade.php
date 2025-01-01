
<div class="col-xl-{{$xl}} col-lg-{{$lg}} col-md-{{$md}} col-sm-{{$sm}} col-12 {{$parentClass}}">
	<label for="{{$idName}}" class="form-label">{{$caption}}</label>
	<div class="form-check{{$isRTL?'-reverse':''}} form-switch">
		<input class="form-check-input {{$inputClass}} " type="checkbox" role="switch" name="{{$idName}}" id="{{$idName}}" value="{{$value}}" {{$initValue?'checked':''}}  {{$extraAttribute}}>
		<label class="form-check-label" for="{{$idName}}">{{$switchText}}</label>
	</div>
</div>