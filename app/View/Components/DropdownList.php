<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DropdownList extends Component
{
	
	public $xl;
	public $lg;
	public $md;
	public $sm;
	public $parentClass;
	public $idName;
	public $initValue;
	public $caption;
	public $placeholder;
	public $multi;
	public $values;
	public $extraAttribute;
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		$xl="3",$lg="4",$md="4",$sm="6",$parentClass=null,
		$idName=null,
		$initValue=null,
		$caption=null,
		$placeholder=null,
		$multi=false,
		$values=array(),
		$extraAttribute=null
	){

		
		$this->xl = $xl;
		$this->lg = $lg;
		$this->md = $md;
		$this->sm = $sm;
		$this->parentClass = $parentClass;
		$this->multi = $multi;

		$this->idName = $idName??"id-".(gettimeofday(true) * 1000 % 10000);
		$this->initValue = $initValue??(old($idName)??"");
		$this->caption = $caption;

		$this->placeholder = $placeholder;
		$this->values = $values;
		$this->extraAttribute = $extraAttribute;

	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.dropdown-list');
	}
}
