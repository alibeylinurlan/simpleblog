<?php

namespace App\Http\Controllers;

use App\Models\FotoVideo;
use App\Http\Requests\StoreFotoVideoRequest;
use App\Http\Requests\UpdateFotoVideoRequest;

class FotoVideoController extends Controller
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
     * @param  \App\Http\Requests\StoreFotoVideoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotoVideoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FotoVideo  $fotoVideo
     * @return \Illuminate\Http\Response
     */
    public function show(FotoVideo $fotoVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FotoVideo  $fotoVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(FotoVideo $fotoVideo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoVideoRequest  $request
     * @param  \App\Models\FotoVideo  $fotoVideo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFotoVideoRequest $request, FotoVideo $fotoVideo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FotoVideo  $fotoVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy(FotoVideo $fotoVideo)
    {
        //
    }
}
