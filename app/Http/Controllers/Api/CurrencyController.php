<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Currency;
use App\Http\Resources\CurrencyResource;
use App\Http\Requests\Currency\{
    StoreRequest,
    UpdateRequest
};

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currencies = Currency::all();

        return response()->json(['data' => CurrencyResource::collection($currencies)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $currency = Currency::create($request->all());

        return response()->json(['data' => new CurrencyResource($currency)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $currency = Currency::find($id);
        if (is_null($currency)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        return response()->json(['data' => new CurrencyResource($currency)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $currency = Currency::find($id);
        if (is_null($currency)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $currency->update($request->all());

        return response()->json(['data' => new CurrencyResource($currency)]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $currency = Currency::find($id);
        if (is_null($currency)) {
            return response()->json([
                'data' => false,
                'message' => 'Data is not found'
            ]);
        }

        $currency->delete();
        return response()->json([
            'data' => [],
            'message' => 'Data has been deleted'
        ]);
    }
}
