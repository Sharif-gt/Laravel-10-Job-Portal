<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CastomPage;
use Illuminate\Http\Request;

class MenuBulderController extends Controller
{
    public function index()
    {
        return view('admin.menu-bulder.index');
    }
}
