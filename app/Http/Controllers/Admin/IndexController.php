<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckAdmin;
use App\Role;
use App\Instructor;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function __construct()
    {
//        return $this->middleware(CheckAdmin::class);
    }

    function index()
    {
        $lecturers = Instructor::all();
        return view('admin.dashboard', compact('lecturers'));
    }
}
