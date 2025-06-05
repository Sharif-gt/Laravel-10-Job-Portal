<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CastomPage;
use Illuminate\Http\Request;

class MenuBulderController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:menu builder']);
    }

    public function index()
    {
        return view('admin.menu-bulder.index');
    }
}
