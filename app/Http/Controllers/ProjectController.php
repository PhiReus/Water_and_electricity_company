<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function create() {
        $contractors = Contractor::all();
        return view('projects.create', compact('contractors'));
    }

    public function store(Request $request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('users'), $image_name);
            $data['image'] = $image_name;
        }

        Project::create($data);

        try{
            return redirect()->route('projects.index')->with(['success' => 'Thêm dự án thành công!']);
        }catch(\Exception $e) {
            return view('projects.create')->with(['error' => 'Vui lòng thử lại!']);
        }
    }

    public function edit($id) {
        $project = Project::find($id);
        $contractors = Contractor::all();

        return view('projects.edit', compact('project', 'contractors'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $project = Project::find($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('users'), $image_name);
            $data['image'] = $image_name;
        }

        $project->update($data);

        try{
            return redirect()->route('projects.index')->with(['success' => 'Sửa dự án thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Có lổi xảy ra, vui lòng thử lại!']);
        }
    }

    public function destroy($id) {
        $project = Project::find($id);
        Project::destroy($id);
        try{
            return redirect()->route('projects.index')->with(['success' => 'Xóa dự án thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Xóa thất bại!']);
        }
    }
}
