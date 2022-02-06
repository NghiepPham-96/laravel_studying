<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestPostRequest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test');
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
        // $validated = $request->validate([
        //     'title' => 'required',
        //     'date' => 'required|date_format:Y/m/d',
        // ]);

        $validator = validator($request->all(), [
            'title' => 'required',
            // 'date1' => 'required|date_format:Y/m/d',
            // 'date2' => 'required|date_format:Y/m/d|custom_after_or_equal:date1',
            'chumon.*.date1' => 'required|date_format:Y/m/d',
            'chumon.*.date2' => 'required|date_format:Y/m/d|custom_after_or_equal:chumon.*.date1',
        ]);

        if ($validator->errors()) {
            return 'Has Error';

        }

        dd($request);
        return;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
