<?php
namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch relevant data for the dashboard
        return view('dashboard');
    }
}