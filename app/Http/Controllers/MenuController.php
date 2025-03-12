<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('foods')->get();
        return response()->json($categories);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category = Category::create(['name' => $request->name]);

        return response()->json([
            'message' => 'دسته‌بندی با موفقیت اضافه شد!',
            'category' => $category
        ], 201);
    }

    public function storeFood(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required',
            'price'       => 'required|numeric'
        ]);

        $food = Food::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price
        ]);

        return response()->json([
            'message' => 'غذا با موفقیت اضافه شد!',
            'food' => $food
        ], 201);
    }
}
