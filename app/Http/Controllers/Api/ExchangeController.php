<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exchange;
use App\Http\Resources\ExchangeResource;
use App\Http\Requests\Exchange\{
    StoreRequest,
    UpdateRequest
};

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Exchange::all();

        return response()->json(['data' => ExchangeResource::collection($directions)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $exchange = Exchange::create($request->all());

        return response()->json(['data' => new ExchangeResource($exchange)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $exchange = Exchange::find($id);
        if (is_null($exchange)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        return response()->json(['data' => new ExchangeResource($exchange)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $exchange = Exchange::find($id);
        if (is_null($exchange)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $exchange->update($request->all());

        return response()->json(['data' => new ExchangeResource($exchange)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $exchange = Exchange::find($id);
        if (is_null($exchange)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $exchange->delete();
        return response()->json([
            'data' => [],
            'message' => 'Data has been deleted'
        ]);
    }
}
