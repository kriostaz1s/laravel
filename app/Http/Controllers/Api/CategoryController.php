<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorys = Category::all();

        return response()->json([
            'status' => true,
            'message' => 'Category retrieved',
            'data' => $categorys,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'done' => 'boolean',
        ]);

        $categorys = Category::create($data);

        return response()->json([
            'status' => true,
            'message' => 'Category created',
            'data' => $categorys,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $category = Category::find($id);

        return response()->json([
            'status' => true,
            'message' => 'Category found',
            'data' => $category,
        ]);
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
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'done' => 'boolean',
        ]);

        $category = Category::find($id);

        if ($category) {
            $category->update($data);
            return response()->json([
                'status' => true,
                'message' => 'Category updated',
                'data' => $category,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
                'data' => null,
            ]);

        };


    }


/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function destroy(Request $request, $id)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'done' => 'boolean',
    ]);

    $category = Category::find($id);

    if ($category) {
        $category->delete($data);
        return response()->json([
            'status' => true,
            'message' => 'Category destroyed',
            'data' => null,
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'Category not found',
            'data' => null,
        ]);

    };
}
}
