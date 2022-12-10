<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|min:3',
            'mobile' => 'required|digits: 10',
            'gender' => 'required',
            'addr1' => 'required|min:6',
            'extra' => 'required|min:0'
        ]);

        $visitor = new Visitor();
        $visitor->fullname = $validated['fullname'];
        $visitor->mobile = $validated['mobile'];
        $visitor->gender = $validated['gender'];
        $visitor->addr1 = $validated['addr1'];
        $visitor->extra = $validated['extra'];
        $amount = 200 + ($visitor->extra * 200);
        $visitor->amount = $amount;
        $visitor->createdby = Auth::user()->name;
        $visitor->updatedby = Auth::user()->name;
        $visitor->save();
        // session()->flash('status', "Visitor Details Saved Successfully. Reg ID: $visitor->id");
        return back()->with('status', "Visitor Details Saved Successfully. Reg ID: $visitor->id");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
