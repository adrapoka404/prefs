<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index(){
        $permissions = Permission::paginate(20);
        return view('admin/permissions/index', compact('permissions'));
    }

    public function populate(){
        
        $routeCollection = Route::getRoutes();
        
        foreach ($routeCollection as $value) {
            if ($value->getName() != '') {
                $existe = Permission::where('name', $value->getName())->first();
                if (!$existe)
                    Permission::create(['name' => $value->getName()]);
            }
        }
        return redirect()->route('admin_permissions.index')->with('info', 'Se han relacionado las rutas con los permisos en la plataforma');
    }

    public function destroy(){
        return "destroy";
    }
}
