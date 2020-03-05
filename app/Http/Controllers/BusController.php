<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bus;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('bus.index', compact('buses'));
    }

    public function create()
    {
        return view('bus.create');
    }

    public function store()
    {
        $request = request();
        //dd($request);
        $bus = new Bus;
        $bus->guardar($request);

        return redirect('bus/nuevo');


    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $bus = Bus::find($id);
        return view('bus.edit', compact('bus'));
    }

    public function update(Bus $bus)
    {
        $request = request();
        $new_bus = new Bus;
        $new_bus->actualizar($request, $bus);

        return redirect('bus');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect('bus');
    }
}
