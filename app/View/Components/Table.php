<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
	public $parentClass;
	public $model;
	public $idName;
	public $dataRecord;
	public $fieldsNames;
	public $colLabels;
	public $showRoute;
	public $otherRoutes;
	public $editRoute;
	public $deleteRoute;
	public $recordPk;
	public $extraValues;
	public $extraValuesColsNames;
	public $colsSize;
	public $actionWidth;
	public $filters;
	public $filtersType;
	public $filtersValues;
	public $filtersBootstrap;
	public $filtersLabels;
	public $resetUrl;

	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		$model=null,
		$parentClass=null,
		$idName=null,
		$dataRecord=array(),
		$fieldsNames=array(),
		$colLabels=array(),
		$showRoute=null,
		$otherRoutes=array(),   //array("name"=>"","method"=>"","icon"=>"","helpText"=>"","confirmMessage"=>"")
		$editRoute=null,
		$deleteRoute=null,
		$recordPk=null,
		$extraValues=array(),
		$extraValuesColsNames=array(),
		$filters=array(),
		$filtersType=array(),
		$filtersValues=array(),
		$filtersBootstrap=array(),
		$filtersLabels=array(),
		$resetUrl=null
	)
	{
		$this->model = $model;
		$this->parentClass = $parentClass;
		$this->idName = $idName??"id-".(gettimeofday(true) * 1000 % 10000);
		$this->dataRecord = $dataRecord;
		$this->fieldsNames = $fieldsNames;
		$this->colLabels = $colLabels;
		$this->showRoute = $showRoute;
		$this->otherRoutes = $otherRoutes;
		$this->editRoute = $editRoute;
		$this->deleteRoute = $deleteRoute;
		$this->recordPk = $recordPk;
		$this->extraValues = $extraValues;
		$this->extraValuesColsNames = $extraValuesColsNames;
		$this->filters = $filters;
		$this->filtersType = $filtersType;
		$this->filtersValues = $filtersValues;
		$this->filtersLabels = $filtersLabels;
		$this->resetUrl = $resetUrl;
		$this->filtersBootstrap = $filtersBootstrap;

		if($model && !$this->dataRecord){
			$this->dataRecord = $model::where($recordPk,"<>",null);
		}

		$can_filter = !($this->dataRecord instanceof \Illuminate\Database\Eloquent\Collection || $this->dataRecord instanceof Illuminate\Support\Collection || $this->dataRecord instanceof \Traversable || is_array($this->dataRecord));
		
		if($can_filter){
			
			if((count($this->filters)>0 || $resetUrl)){
				$temp = $this->filters[0]??null;
				$this->filters[0] = "page_records_limit";
				if($temp){
					$this->filters[] = $temp;
				}
				$this->filtersType["page_records_limit"] = "dropdown-list";
				$this->filtersLabels["page_records_limit"] = __('caption.labels.paginate.count');
				$this->filtersValues["page_records_limit"] = array(10=>10,25=>25,50=>50,100=>100);
			}

			$page_records_limit = 10;
			if(isset($_GET['filter'][$this->idName])){
				foreach($_GET['filter'][$this->idName] as $key=>$value){
					if($key == 'page_records_limit'){
						$page_records_limit = $value<200 || $value>=5 ? $value : 10;
					}else{
						if(in_array($key,$this->filters)){
							if($value){
								if($model)
									$this->dataRecord = $model::filterModelsData($this->dataRecord,$key,$value);
								else{
									$this->dataRecord = $this->dataRecord->where($key,$value);
								}
							}
						}
					}
				}
			}
			$this->dataRecord = $this->dataRecord->paginate($page_records_limit);
		}
		$this->colsSize = 1 + sizeof($fieldsNames) + sizeof($extraValues)+  sizeof($otherRoutes)+ ($showRoute&&$recordPk?1:0)+ ($deleteRoute&&$recordPk?1:0)+ ($editRoute&&$recordPk?1:0);
		$this->actionWidth = (sizeof($otherRoutes)+ ($showRoute&&$recordPk?1:0)+ ($deleteRoute&&$recordPk?1:0)+ ($editRoute&&$recordPk?1:0))*40;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.table');
	}
}
