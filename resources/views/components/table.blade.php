<form action="">
	<div class="row">
		@foreach($_GET as $key=>$value)
			@if($key == 'filter')
				@continue
			@endif
			<input type="hidden" name="{{$key}}" value="{{$value}}">
		@endforeach
		@foreach($filters as $filterName)
			@if(isset($filtersType[$filterName]) && $filtersType[$filterName] == 'dropdown-list' && isset($filtersValues[$filterName]))
				<x-dropdown-list
					idName="filter[{{$idName}}][{{$filterName}}]"
					:initValue="old('filter[$idName][$filterName]')??($_GET['filter'][$idName][$filterName]??null)"
					:caption="$filtersLabels[$filterName]??null"
					:values="$filtersValues[$filterName]"
					:xl="$filtersBootstrap[$filterName]['xl']??2"
					:lg="$filtersBootstrap[$filterName]['lg']??3"
					:md="$filtersBootstrap[$filterName]['md']??4"
					:sm="$filtersBootstrap[$filterName]['sm']??6"
					:placeholder="__('caption.labels.select-label')"
					{{-- parentClass="mb-3" --}}
					{{-- extraAttribute="" --}}
				></x-dropdown-list>
			@else
				<x-textfield
					idName="filter[{{$idName}}][{{$filterName}}]"
					:initValue='old("filter[$idName][$filterName]")??($_GET["filter"][$idName][$filterName]??"")'
					:caption="$filtersLabels[$filterName]??''"
					type="text"
					:xl="$filtersBootstrap[$filterName]['xl']??2"
					:lg="$filtersBootstrap[$filterName]['lg']??3"
					:md="$filtersBootstrap[$filterName]['md']??4"
					:sm="$filtersBootstrap[$filterName]['sm']??6"
					{{-- parentClass="mb-3" --}}
					{{-- extraAttribute="" --}}
					{{-- placeholder="" --}}
					{{-- hint="" --}}
				>
					{{-- slot --}}
				</x-textfield>
			@endif
		@endforeach
		@if(count($filters))
			<x-inline-btn xl='2' :caption="__('caption.labels.search')"></x-inline-btn>
			
			@if($resetUrl)
				<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
					<label for="">.</label>
					<a href="{{$resetUrl}}" class="btn btn-outline-danger form-control mt-2">{{__('caption.labels.reset')}}</a>
				</div>
			@endif
		@endif
	</div>
</form>
<div class="row mt-3">
	<div class="col-12 table-responsive {{$parentClass}}">
		<table class="table table-striped table-hover" >
			<thead class="thead-light">
				<tr>
					<th scope="col">#</th>
					@foreach ($colLabels as $label)
						<th scope="col">{!! $label !!}</th>
					@endforeach
					@foreach ($extraValuesColsNames as $label)
						<th scope="col">{!! $label !!}</th>
					@endforeach
					@if(($showRoute || $editRoute || $deleteRoute || sizeof($otherRoutes)>0) && $recordPk)
						<th scope="col" style="text-align: center;width:{{$actionWidth}}px">{!! __('caption.labels.actions') !!}</th>
					@endif
				</tr>
			</thead>
			<tbody  class="table-group-divider">
				<?php 
				$i=0;
				if($dataRecord instanceof \Illuminate\Pagination\LengthAwarePaginator ){
					$i = ($dataRecord->currentPage()-1) * $dataRecord->perPage();
					#total: 10	#lastPage: 5	#perPage: 2	#currentPage: 5	#fragment: null	#pageName: "page"	#onEachSide: 3
				}
				?>
				@forelse ($dataRecord as $record)
				<tr>
					<th scope="row">{!! ++$i !!}</th>
					@foreach ($fieldsNames as $field)
						<td scope="col">{!! $record->$field !!}</td>
					@endforeach
					@foreach ($extraValuesColsNames as $key=>$label)
						<?php 
							$value = $extraValues[$key][$i-1]??($extraValues[$key]['default']??'-');
						?>
						<td scope="col">{!! $value??('') !!}</td>
					@endforeach
					@if(($showRoute || $editRoute || $deleteRoute || sizeof($otherRoutes)>0) && $recordPk)
					<td scope="col" style="text-align: center;">
						@if($editRoute)
							<a href="{!! route($editRoute,$record->$recordPk) !!}"><span class="bi-pencil-square btn btn-sm btn-success"></span></a>
						@endif
						@foreach ($otherRoutes as $otherRoute)
							<form action="{{route($otherRoute['name'],$record->$recordPk)}}" method="{{$otherRoute['method']??'GET'}}" style="display: inline;">
								@CSRF
								<input type="hidden" name="{{$recordPk}}" value ="{{$record->$recordPk}}">
								<button class="{{$otherRoute['icon']??'bi-pencil-square btn-info'}} btn btn-sm" title="{{$otherRoute['helpText']??''}}"
								{!!isset($otherRoute['confirmMessage'])?"onclick='return confirm(`".$otherRoute['confirmMessage']."`);'":""!!}
								> </button>
							</form>
						@endforeach
						@if($showRoute)
							<a href="{!! route($showRoute,$record->$recordPk) !!}"><span class="bi-eye btn btn-sm btn-primary"></span></a>
						@endif
						@if($deleteRoute)
							<form action="{!! route($deleteRoute,$record->$recordPk) !!}" method="post" style="display: inline-block;">
								@method("DELETE")
								@CSRF
								<button class="bi-trash-fill btn btn-sm btn-danger" onclick="return confirm(`{{__('messages.other.confirm_delete')}}`);"> </button>
							</form>
						@endif
					</td>
					@endif
				</tr>
				@empty
				<tr>
					<td colspan="{{$colsSize}}" style="text-align: center;">{{__('messages.other.no-data')}}</td>
				</tr>
				@endforelse
			</tbody>
		</table>
	</div>
	@if($dataRecord instanceof \Illuminate\Pagination\LengthAwarePaginator )
		<div class="col-12">
			<?php
				$dataRecord->setPath($_SERVER['REQUEST_URI']); 			
			?>
			{!! $dataRecord->links() !!}
		</div>
	@endif
</div>