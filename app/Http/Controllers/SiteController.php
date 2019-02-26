<?php

namespace Corp\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    protected $p_rep;
    protected $s_rep;
    protected $a_rep;
    protected $m_rep;

    protected $template;

    protected $vars = [];

    protected $contentRightBar = false;
    protected $contentLeftBar = false;

    protected $bar = false;

    public function __construct(){

    }

    protected function renderOutput(){

    	$navigation = view(env('THEME').'.navigation')->render();
    	$this->vars = array_add($this->vars,'navigation',$navigation);

    	return view($this->template)->with($this->vars);
    }
}
