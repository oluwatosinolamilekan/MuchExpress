<?php

namespace App\Services;
use App\Models\{Menu,Category};
use DB;
class MenuService
{
    public function getMenuWithCategory($restoIds)
    {
        $categories = Menu::with('category')->where('resto_id',$restoIds)
            ->get()
            ->groupBy('category.name');
        return $categories;
    }

    public static function createMenu($request)
    {
        $conditions = [
            'resto_id' => $request['restoId'],
            'name' => $request['category'],
        ];
        $category = Category::where($conditions)->first();
        DB::beginTransaction();
        $menu = Menu::create([
            'name' => $request->item,
            'price' => $request->price,
            'resto_id' => $request->restoId,
            'category_id' => $category->id,
            'description' => $request->description,
        ]);
        if ($menu) {
            DB::commit();
           return $menu;
        }else{
            DB::rollback();
            return false;
        }
    }
}