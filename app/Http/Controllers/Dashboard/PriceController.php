<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all();
        return view('dashboard.prices.index', ['prices' => $prices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.prices.create');

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
            'name'  => 'required',
            'value' => 'required|numeric',
        ]);

        try {
            Price::create($request->all());
            return redirect()->route('dashboard.prices.create')->with('success', 'El precio se agregó correctamente');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.prices.create')->with('error', 'Error en agregar nuevo precio, ERROR: ' . $e->getMessage());

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        return view('dashboard.prices.edit', ['price' => $price]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $request->validate([
            'name'  => 'required',
            'value' => 'required|numeric',
        ]);

        try {
            $price->update($request->all());
            return redirect()->route('dashboard.prices.edit', $price)->with('success', 'El precio se actualizo correctamente');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.prices.edit', $price)->with('error', 'Error en actualizar el precio, ERROR: ' . $e->getMessage());

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        try {
            $price->delete();
            return redirect()->route('dashboard.prices.index')->with('success', 'El precio se eliminó correctamente');
        } catch (\Exception$e) {
            return redirect()->route('dashboard.prices.index')->with('error', 'Error al eliminar el precio, ERROR: ' . $e->getMessage());

        }

    }
}
