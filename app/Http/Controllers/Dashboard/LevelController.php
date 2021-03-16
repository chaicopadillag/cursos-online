<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        return view('dashboard.levels.index', ['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.levels.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels',
        ]);

        try {
            Level::create($request->all());
            return redirect()->route('dashboard.levels.create')->with('success', 'El nivel se creo correctamente');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.levels.create')->with('error', 'Error al crear el nivel, ERROR: ' . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        return view('dashboard.levels.show', ['level' => $level]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        return view('dashboard.levels.edit', ['level' => $level]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name' => 'required|unique:levels,name,' . $level->id,
        ]);

        try {
            $level->update($request->all());
            return redirect()->route('dashboard.levels.edit', $level)->with('success', 'El nivel se actualizó correctamente');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.levels.edit', $level)->with('error', 'Error al actualizar el nivel, ERROR: ' . $e->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Level $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        $level->delete();
        return redirect()->route('dashboard.levels.index')->with('success', 'El nivel se eliminó correctamente');

    }
}
