<?php

namespace App\Http\Controllers;

use App\Models\MarkSix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarkSixController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $year
     * @return \Illuminate\Http\Response
     */
    public function show(Int $year)
    {
        //
        // print($year);
        $path = "public"."/mark-six/{$year}.json";
        // print($path);
        $markSixJsonContent = Storage::get($path);
        if(!$markSixJsonContent) {
            return response('null', 404)->header('Content-Type', 'application/json');
        };
        return (json_decode($markSixJsonContent));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarkSix  $markSix
     * @return \Illuminate\Http\Response
     */
    public function edit(MarkSix $markSix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarkSix  $markSix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarkSix $markSix)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarkSix  $markSix
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarkSix $markSix)
    {
        //
    }
}
