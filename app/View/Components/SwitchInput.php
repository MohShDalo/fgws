<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SwitchInput extends Component
{

	public $xl;
	public $lg;
	public $md;
	public $sm;
	public $parentClass;
	public $idName;
	public $initValue;
	public $caption;
	public $isRTL;
	public $value;
	public $switchText;
	public $extraAttribute;
	public $inputClass;

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
		$value="true",
		$switchText=null,
		$extraAttribute=null,
		$inputClass=null
	){

		$this->xl = $xl;
		$this->lg = $lg;
		$this->md = $md;
		$this->sm = $sm;
		$this->parentClass = $parentClass;

		$this->idName = $idName??"id-".(gettimeofday(true) * 1000 % 10000);
		$this->initValue = $initValue??(old($idName)??"");
		$this->isRTL = \Config::get('app.locale') == 'ar'; 

		$this->caption = $caption;

		$this->value = $value;
		$this->switchText = $switchText;
		$this->extraAttribute = $extraAttribute;
		$this->inputClass = $inputClass;
	// $inputClass = isset($inputClass)?"form-check-input-lg":"";

	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.switch-input');
	}
}
