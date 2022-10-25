<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePosition;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::orderBy('name', 'asc')->paginate(5);
        return view('admin/positions/index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePosition $request)
    {
        $position = new Position();

        $position->create($request->all()['position']);

        return redirect()->route('positions.index')->with('info', '¡Puesto ' . $position->name . ' creado con éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $position = Position::find($id);
        $position->status = 1;
        $position->update();
        
        return redirect()->route('positions.index')->with('info', '¡Puesto ( ' . $position->name . ' ) activado con éxito!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position = Position::find($id);
        return view('admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePosition $request, $id)
    {
        $position = Position::find($id);
        $position->update($request->all()['position']);

        return redirect()->route('positions.index')->with('info', 'Puesto ' . $position->name . '  editado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $position = Position::find($id);
        $position->status = 0;
        $position->update();
        
        return redirect()->route('positions.index')->with('info', '¡Puesto ( ' . $position->name . ' ) desactivado con éxito!');
    }
}
