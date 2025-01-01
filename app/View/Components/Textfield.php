<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textfield extends Component
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
	public $type;
	public $extraAttribute;
	public $hint;


	
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		$xl="3",$lg="4",$md="4",$sm="6",$parentClass=null,
		$idName=null,$initValue=null,$caption=null,$placeholder=null,$type="text",$extraAttribute=null,$hint=null
	){
		$this->xl = $xl;
		$this->lg = $lg;
		$this->md = $md;
		$this->sm = $sm;
		$this->parentClass = $parentClass;

		$this->idName = $idName??"id-".(gettimeofday(true) * 1000 % 10000);
		$this->initValue = $initValue??(old($idName)??"");
		$this->caption = $caption;

		$this->placeholder = $placeholder;
		$this->type = $type;
		$this->extraAttribute = $extraAttribute;
		$this->hint = $hint;

	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.textfield');
	}
}
