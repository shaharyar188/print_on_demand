<?php

namespace App\Http\Controllers;

use App\Models\Niche;
use App\Http\Requests\StoreNicheRequest;
use App\Http\Requests\UpdateNicheRequest;
use App\Models\User;

class NicheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $compact = compact("user");
        return view('Niche.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $compact = compact("user");
        return view('Niche.create')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNicheRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Niche $niche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niche $niche)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNicheRequest $request, Niche $niche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niche $niche)
    {
        //
    }
    public function add_niche()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $compact = compact("user");
        return view('Niche.create')->with($compact);
    }
}
