<?php

namespace App\Http\Controllers;

use App\Models\Operational\Recording\Reproduksi;
use App\Http\Requests\Reproduksi\StoreReproduksiRequest as StoreRequest;
use App\Http\Requests\Reproduksi\UpdateReproduksiRequest as UpdateRequest;

class ReproduksiController extends Controller
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
     * @param  \App\Models\Operational\Recording\Reproduksi  $reproduksi
     * @return \Illuminate\Http\Response
     */
    public function show(Reproduksi $reproduksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operational\Recording\Reproduksi  $reproduksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reproduksi $reproduksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operational\Recording\Reproduksi  $reproduksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Reproduksi $reproduksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operational\Recording\Reproduksi  $reproduksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reproduksi $reproduksi)
    {
        //
    }
}
