<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index() {
        $data['roles'] = Role::all();
        return view('admin.role.index', $data);
    }

    public function add(){
        return view('admin.role.add');
    }

    public function store(Request $request) {

       $request->validate([
            'name' => 'required|max:250',
        ]);
    
        $role = new Role();
        $role->name = $request->name;
        $role->save();
  
        $notification = array(
            'messege' => 'Regra adicionada com sucesso!',
            'alert' => 'success'
        );
        return redirect(route('admin.role.index'))->with('notification', $notification);
    }

    public function edit($id){

        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|max:250',
        ]);

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();

        $notification = array(
            'messege' => 'Regra atualizada com sucesso!',
            'alert' => 'success'
        );
        return redirect(route('admin.role.index'))->with('notification', $notification);
    }

    public function managePermissions($id) {
        $data['role'] = Role::find($id);
        return view('admin.role.permission', $data);
    }

    public function updatePermissions(Request $request, $id) {

        $permissions = json_encode($request->permissions);
        $role = Role::find($id);
        $role->permissions = $permissions;
        $role->save();
  
        $notification = array(
            'messege' => "Permissões atualizadas com sucesso para '$role->name' role",
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
      }

      public function delete(Request $request, $id) {

        $role = Role::findOrFail($id);
        if ($role->admins()->count() > 0) {
            $notification = array(
                'messege' => "Exclua os usuários nesta função primeiro.",
                'alert' => 'warning'
            );
            return redirect()->back()->with('notification', $notification);
        }
        $role->delete();
  
        $notification = array(
            'messege' => "Função excluída com sucesso!",
            'alert' => 'success'
        );
        return redirect()->back()->with('notification', $notification);
      }

}
