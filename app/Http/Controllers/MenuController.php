<?php

namespace App\Http\Controllers;
use App\Services\MenuService;
use App\Http\Requests\StoreMenuRequest;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function store(StoreMenuRequest $request)
    {
        try {
            $validator = $request->validated();
            if($validator){
                $createMenu = MenuService::createMenu($request);
                if ($createMenu) {
                    return response()->json($createMenu);
                }
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
            
        }
    }
}
