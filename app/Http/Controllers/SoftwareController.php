<?php

namespace App\Http\Controllers;

use App\Interfaces\SoftwareRepositoryInterface;
use App\Services\SoftwareService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $service;

    public function __construct(SoftwareService $service)
    {
        $this->service = $service;
//        $this->middleware('auth:api');
    }

    public function index()
    {
        return $this->service->index();
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
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
            return $this->service->store($validator->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->service->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
