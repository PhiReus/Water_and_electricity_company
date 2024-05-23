<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Category::create($data);
        echo json_encode(['status' => 'success', 'message' => 'Thành công!']);
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $category = Category::find($id);
        $category->update($data);

        echo json_encode(['status' => 'success', 'message' => 'Thành công!']);
        exit;
    }

    public function getCategory(Request $request) {
        $id = $request->input('category_id');
        $category = Category::find($id);

        echo json_encode(['name' => $category->name]);
        exit;
    }

    public function destroy($id) {
        Category::destroy($id);

        try{
            return redirect()->route('categories.index')->with(['success' => 'Xóa danh mục thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Xóa danh mục thất bại!']);
        }
    }
}
