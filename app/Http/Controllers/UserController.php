<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Group;

class UserController extends Controller
{
    public function index() {

        // $this->authorize('view', User::class);
        $users = User::all();
        $groups = Group::all();
        $params = ['users' => $users, 'groups' => $groups];
        // dd($params);
        return view('users.index', $params);
    }



    // public function create() {
    //     // return view('users.create');
    //     $users = User::all();
    //     $rs = '';
    //     foreach ($users as $user) {
    //        $rs .= "<tr><td>{$user->id}</td><td>123</td><td>123</td><td>123</td><td>123</td><td>123</td><td>123</td><td>123</td></tr>";
    //     }
    //     return $rs;
    // }

    public function store(Request $request) {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('users'), $image_name);
            $data['image'] = $image_name;
        }

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        User::create($data);

        echo json_encode(['status' => 'success', 'message' => 'Thành công']);
        exit;
    }

    public function edit($id) {
        $user = User::find($id);
        // $this->authorize('update', $user);

        $groups = Group::all();
        return view('users.edit', compact('user', 'groups'));
    }

    public function update(Request $request, $id) {
        $data = $request->all();
        $user = User::find($id);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->move(public_path('users'), $image_name);
            $data['image'] = $image_name;
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('user.index')->with(['success' => 'Sửa nhân viên thành công!']);
    }

    public function destroy($id) {
        $user = User::find($id);
        User::destroy($id);
        try{
            return redirect()->route('user.index')->with(['success' => 'Xóa nhân viên thành công!']);
        }catch(\Exception $e) {
            return redirect()->back()->with(['error' => 'Xóa thất bại!']);
        }
    }
}
