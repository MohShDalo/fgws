<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InlineBtn extends Component
{
	public $caption;
	public $colorClass;
	public $parentClass;
	public $inputClass;
	public $lg;
	public $xl;
	public $md;
	public $sm;
	public $mb;
	
	/**
	 * Create a new component instance.
	 *
	 * @return void
	 */
	public function __construct(
		$xl="2",$lg="3",$md="4",$sm="6",$parentClass=null,$mb="2",
		$caption=null,$colorClass="info",$inputClass=null
	){
		$this->caption = $caption;
		$this->colorClass = $colorClass;
		$this->inputClass = $inputClass;
		$this->parentClass = $parentClass;
		$this->xl = $xl;
		$this->lg = $lg;
		$this->md = $md;
		$this->sm = $sm;
		$this->mb = $mb;
	}

	/**
	 * Get the view / contents that represent the component.
	 *
	 * @return \Illuminate\Contracts\View\View|\Closure|string
	 */
	public function render()
	{
		return view('components.inline-btn');
	}
}
