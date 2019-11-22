<?php

namespace App\Http\Controllers;
use App\Services\MenuService;
use App\Services\RestoService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menuservice $service, RestoService $restoService)
    {
        $restoId  = 1;
        $menus = $service->getMenuWithCategory($restoId);

        $resto = $restoService->userRestoAndTables();

        return view('home',compact('menus','restoId','resto'));
    }
}
