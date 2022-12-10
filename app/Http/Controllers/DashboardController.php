<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $visitorcount = Visitor::count();
        $visitors = Visitor::where('gender', '=', 'male')->get();
        return view('dashboard', [ 'visitors' => $visitors, 'count' => $visitorcount]);
    }
}
