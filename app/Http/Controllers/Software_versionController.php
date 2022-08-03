<?php

namespace App\Http\Controllers;

use App\Services\Software_versionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Software_versionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $software_versionService;
    public function __construct(Software_versionService $software_versionService)
    {
        $this->software_versionService = $software_versionService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'software_name' => 'required|string|min:3',
                'software_desc' => 'required|string',
                'software_img' => 'file|image|',
                'software_type' => 'required|integer|in:0,1',
            ]);
        if ($validator->fails())
            return response()->json(['error' => $validator->errors()]);
        else
            return $this->service->update($validator->validated(), $id);
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
