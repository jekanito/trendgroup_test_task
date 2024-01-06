<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Direction;
use App\Http\Resources\DirectionResource;
use App\Http\Requests\Direction\{
    StoreRequest,
    UpdateRequest
};

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $directions = Direction::all();

        return response()->json(['data' => DirectionResource::collection($directions)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $direction = Direction::create($request->all());

        return response()->json(['data' => new DirectionResource($direction)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $direction = Direction::find($id);
        if (is_null($direction)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        return response()->json(['data' => new DirectionResource($direction)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $direction = Direction::find($id);
        if (is_null($direction)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $direction->update($request->all());

        return response()->json(['data' => new DirectionResource($direction)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $direction = Direction::find($id);
        if (is_null($direction)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $direction->delete();
        return response()->json([
            'data' => [],
            'message' => 'Data has been deleted'
        ]);
    }
}
