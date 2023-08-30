<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    public function show(){
        return view('show');
    }
    public function import()
    {
        Excel::import(new UsersImport, 'users.csv');

        return redirect('/show')->with('success', 'All Users Imported Successfully');
    }
}
