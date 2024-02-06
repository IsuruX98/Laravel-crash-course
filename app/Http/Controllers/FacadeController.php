<?php

namespace App\Http\Controllers;

use App\Services\SomeServiceExample;
use App\Services\SomeServiceExampleFacade;
use Illuminate\Http\Request;

// facade is a static interface for a class it allows to call none static method staticly

class FacadeController extends Controller
{
    public function facade()
    {

        // none static method

        // $service = new SomeServiceExample();

        // $service->doSomething();

        //none static method called as a static method using facade

        dd(SomeServiceExampleFacade::doSomething());

        return view('facade.facades');
    }
}
