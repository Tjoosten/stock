<?php

class HomeController extends BaseController {


    public function __construct()
    {
        $this->beforeFilter('guest');
    }

    public function index()
	{
		return View::make('login');
	}

}