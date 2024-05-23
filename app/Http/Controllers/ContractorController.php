<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function index() {

        $contractors = Contractor::all();
        $params = ['contractors' => $contractors];

        return view('contractors.index', $params);
    }

    public function create() {
        return view('contractors.create');
    }

    public function store(Request $request) {
        $data = $request->all();

        Contractor::create($data);

        try{
            return redirect()->route('contractors.index')->with(['success' => 'Thêm nhà thầu thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Vui lòng thử lại!']);
        }
    }

    public function edit(Request $request, $id) {
        $contractor = Contractor::findOrFail($id);
         return view('contractors.edit', compact('contractor'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $contractor = Contractor::find($id);
        $contractor->update($data);

        try{
            return redirect()->route('contractors.index')->with(['success' => 'Sửa nhà thầu thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Vui lòng thử lại!']);
        }
    }

    public function destroy($id) {
        Contractor::destroy($id);

        try{
            return redirect()->route('contractors.index')->with(['success' => 'Xóa nhà thầu thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Vui lòng thử lại!']);  
        }
    }
}
