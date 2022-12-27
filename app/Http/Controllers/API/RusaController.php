<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        try {
            $rusa = Rusa::with(["indukJantan", "indukBetina", "foto"])->get()->append(['recording']);
            return response()->json([
                'message' => 'Success',
                'data' => $rusa,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => app()->environment('production') ? 'Internal Server Error' : $e->getMessage(),
            ], 500);
        }
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
