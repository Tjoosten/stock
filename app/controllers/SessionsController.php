<?php

use Codivex\Services\LoginService;

class SessionsController extends \BaseController {

    protected $loginService;
    public function __construct(LoginService $loginService){
        $this->beforeFilter('guest', array('except' => array('destroy')));
        $this->beforeFilter('csrf', array('only' => array('store')));

        $this->loginService = $loginService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        try
        {
            $login = $this->loginService->auth(Input::all());

            if($login)
            {
                return Redirect::intended('dashboard');
            }

            return Redirect::to('login')->withErrors('Incorrect Credentials')->withInput();
        } catch(Codivex\Exceptions\ValidationException $e)
        {
            return Redirect::back()->withInput()->withErrors($e->getErrors());
        } catch(ErrorException $e)
        {
            return Redirect::to('login')->withErrors('Incorrect Credentials')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy()
    {
        if(Auth::user())
        {
            Auth::logout();
            return Redirect::to('login')->withSuccess("You've successfully logged out.");
        }
        return Redirect::to('login');
    }

}