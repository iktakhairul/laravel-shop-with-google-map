<?php

namespace App\Http\Controllers;

class AdminsHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.home');
    }
}
