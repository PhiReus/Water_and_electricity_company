<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Role;

class GroupController extends Controller
{
    protected $role;

    public  function __construct(Role $role) {
        $this->role = $role;
    }
    public function index() {
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Group::create($data);
        echo json_encode(['status' => 'success', 'message' => 'Thành công!']);
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $group = Group::find($id);
        $group->update($data);

        echo json_encode(['status' => 'success', 'message' => 'Thành công!']);
        exit;
    }

    public function show($id) {
        $group = Group::find($id);
        $roles = Role::all();
        $active_roles = $group->roles->pluck('id')->toArray();

        $all_roles = [];
        foreach($roles as $role) {
            $all_roles[$role['group_name']][] = $role;
        }
        $params = [
            'group' => $group,
            'all_roles' => $all_roles,
            'active_roles' => $active_roles,
        ];

        return view('groups.show', $params);
    }

    public function destroy($id) {
        Group::destroy($id);

        try{
            return redirect()->route('groups.index')->with(['success' => 'Xóa chức vụ thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Xóa chức vụ thất bại!']);
        }
    }

    public function saveRoles(Request $request, $id) {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);

        return redirect()->route('groups.index')->with(['success' => 'Cấp quyền thất công!']);
    }

    public function getGroup(Request $request) {
        $id = $request->input('group_id');
        $group = Group::find($id);

        echo json_encode(['name' => $group->name]);
        exit;
    }
}
