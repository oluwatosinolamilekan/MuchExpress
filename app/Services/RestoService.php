<?php

namespace App\Services;
use Auth;
class RestoService
{
    public function userRestoAndTables()
    {
       return Auth::user()
            ->restaurants()
            ->get();
    }
}