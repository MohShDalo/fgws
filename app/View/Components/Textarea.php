<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
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
	public $extraAttribute;
	public $rows;
	public $cols;


	
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		$xl="3",$lg="4",$md="4",$sm="6",$parentClass=null,
		$idName=null,$initValue=null,$caption=null,$placeholder=null,$extraAttribute=null,$rows="4",$cols="10"
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
		$this->extraAttribute = $extraAttribute;
		$this->rows = $rows;
		$this->cols = $cols;

	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.textarea');
	}
}
