<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployee;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Empty_;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conditions         = [];
        $company_search     = '';
        $position_search    = '';

        if(is_numeric($request->company)){
            $conditions[] = ['company','=',$request->company];
            $company_search = $request->company;
        }
        
        if(is_numeric($request->position)){
            $conditions[] = ['position','=',$request->position];
            $position_search = $request->position;
        }
        
            
        if(!empty($conditions))
            $employees  = Employee::where($conditions)->orderBy('id', 'desc')->paginate(5);
        else
            $employees  = Employee::orderBy('id', 'desc')->paginate(5);
        
        $companies  = Company::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();
        $positions  = Position::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();

        foreach($employees as &$employee) {
            $employee->company  = Company::find($employee->company);
            $employee->position = Position::find($employee->position);
        }
        
        return view('admin.employees.index', compact('employees', 'companies', 'positions', 'company_search', 'position_search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = Company::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();
        $positions  = Position::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();

        return view('admin.employees.create', compact('companies', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {

        $employee = new Employee();
        $nuevo = $request->all()['employee'];

        $user = User::where('email', $nuevo['mail'])->first();
        if (empty($user)) {
            $user = new User();
            $user->name = $nuevo['name'];
            $user->email = $nuevo['mail'];
            $user->password = Hash::make($nuevo['name'] . '_PREFS');
            $user->save();
        }

        $nuevo['user_id'] = $user->id;

        $employee->create($nuevo);

        return redirect()->route('employees.index')->with('info', '¡Empleado ' . $employee->name . ' creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // que no show, activa el modelo
    {
        $employee = Employee::find($id);
        $employee->status = 1;
        $employee->update();
        return redirect()->route('employees.index')->with('info', '¡Empleado ( ' . $employee->name . ' )  activado con éxito!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee   = Employee::find($id);
        $companies  = Company::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();
        $positions  = Position::select('id','name')->where('status', 1)->orderBy('name', 'asc')->get();

        return view('admin.employees.edit', compact('employee', 'companies', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployee $request, $id)
    {
        $employee = Employee::find($id);
        $editar = $request->all()['employee'];
        
        
        if($editar['mail'] != $employee->mail){
            $user = User::where('email', $editar['mail'])->first();
            if (empty($user)) {
                $user = new User();
                $user->name = $editar['name'];
                $user->email = $editar['mail'];
                $user->password = Hash::make($editar['name'] . '_PREFS');
                $user->save();
            }

            $editar['user_id'] = $user->id;
        }

        $employee->update($editar);
        return redirect()->route('employees.index')->with('info', '¡Empleado ' . $employee->name .  ' editado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // que no destruye solo desactiva
    {
        $employee = Employee::find($id);
        $employee->status = 0;
        $employee->update();
        return redirect()->route('employees.index')->with('info', '¡Empleado ( ' . $employee->name . ' ) desactivado con éxito!');
    }
}
