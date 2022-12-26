<?php

namespace App\Http\Controllers;

use App\Models\Operational\Recording\Administrasi;
use App\Http\Requests\Administrasi\StoreAdministrasiRequest as StoreRequest;
use App\Http\Requests\Administrasi\UpdateAdministrasiRequest as UpdateRequest;

class AdministrasiController extends Controller
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
     * @param  \App\Models\Operational\Recording\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Administrasi $administrasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operational\Recording\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrasi $administrasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operational\Recording\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Administrasi $administrasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operational\Recording\Administrasi  $administrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Administrasi $administrasi)
    {
        //
    }
}
