<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Operational\Recording\Kesehatan;
use App\Http\Requests\Kesehatan\StoreKesehatanRequest as StoreRequest;
use App\Http\Requests\Kesehatan\UpdateKesehatanRequest as UpdateRequest;

class KesehatanController extends Controller
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
     * @param  \App\Models\Operational\Recording\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kesehatan $kesehatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operational\Recording\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Kesehatan $kesehatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operational\Recording\Kesehatan  $kesehatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kesehatan $kesehatan)
    {
        //
    }
}
