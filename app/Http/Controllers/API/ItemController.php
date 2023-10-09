<?php

namespace App\Http\Controllers\API;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ItemController extends Controller
{
    public function index()
    {
        //
        // $items = Item::latest()->paginate(3);
        $items = Item::all();

        foreach ($items as $item) {
            $item['product'] = $item->product;
        }

        return $this->successResponse($items, 'items List with Product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        //
        $validator = $request->validated();
        $item = Item::create($validator);
        if ($item) {
            return $this->successResponse($item, 'item created');
        } else {
            return $this->errorResponse('cant create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item, Request $request, string $id)
    {
        //
        // $project = Project::with('team')->find($project->id);
        // return response()->json([
        //     'project' => $project,
        // ]);

        // $item = Item::where('id', $id)->first();
        $item = Item::with('product')->where('id', $id)->first();

        return $this->successResponse($item, 'item Get');
        // if ($item) {
        //     return $this->successResponse($item, 'item Get');
        // } else {
        //     return $this->errorResponse('cant Get items');
        // }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
