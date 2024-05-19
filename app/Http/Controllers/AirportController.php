<?php

namespace App\Http\Controllers;

use App\Models\Airport;
use App\Http\Requests\StoreAirportRequest;
use App\Http\Requests\UpdateAirportRequest;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAirportRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Airport $Airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Airport $Airport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAirportRequest $request, Airport $Airport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airport $Airport)
    {
        //
    }
}
