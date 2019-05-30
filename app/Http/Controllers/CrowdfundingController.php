<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrowdfundingController extends Controller
{
    public function index()
    {
        return view('crowdfunding.index');
    }
}
