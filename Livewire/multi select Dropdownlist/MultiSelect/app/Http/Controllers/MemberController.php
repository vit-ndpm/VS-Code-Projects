<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\officers;

class MemberController extends Controller
{
    
    public function index()
    {
        
    }

   
    public function create()
    {
        
        //dd($officers);
        return view('welcome');

    }

   
    public function store(Request $request)
    {
        return $request->all();
    }

    
    public function show(Member $member)
    {
        //
    }

    
    public function edit(Member $member)
    {
        //
    }

   
    public function update(Request $request, Member $member)
    {
        //
    }

    
    public function destroy(Member $member)
    {
        //
    }
}
