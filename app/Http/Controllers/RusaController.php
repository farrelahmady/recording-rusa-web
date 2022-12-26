<?php

namespace App\Http\Controllers;

use App\Models\Operational\Rusa;
use App\Http\Requests\Rusa\StoreRusaRequest as StoreRequest;
use App\Http\Requests\Rusa\UpdateRusaRequest as UpdateRequest;

class RusaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operational\Rusa  $rusa
     * @return \Illuminate\Http\Response
     */
    public function show(Rusa $rusa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operational\Rusa  $rusa
     * @return \Illuminate\Http\Response
     */
    public function edit(Rusa $rusa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operational\Rusa  $rusa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Rusa $rusa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operational\Rusa  $rusa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rusa $rusa)
    {
        //
    }
}
