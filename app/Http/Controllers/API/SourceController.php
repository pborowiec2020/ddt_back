<?php

namespace App\Http\Controllers\API;

use App\Models\Source;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\SourceStoreRequest;

class SourceController extends Controller
{
    
    public function index(): JsonResponse
    {
        return response()->json([
            'data' => Source::all()->toArray(),
        ], 200);
    }


    public function store(SourceStoreRequest $request): JsonResponse
    {
        Source::create($request->all());

        return response()->json([
            'message'   => 'Source has been successfully created',
        ], 200);
    }


    public function destroy($source): JsonResponse
    {
        $deleted = Source::destroy($source);
        if ($deleted === 1) {
            return response()->json([
                'message'   => 'Source has been successfully deleted',
            ], 200);
        }

        return response()->json([
            'message'   => 'Item not found',
        ], 404);
    }

}
