<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transporte;
use App\Bus;
use App\Carril;
use App\Departamento;
use App\Empresa;
//use App\Personal;

class TransporteController extends Controller
{
    public function index()
    {
        $this->autorizacion('Encargado');

        $transportes = Transporte::paginate($this->getNumPagination());
        return view('transporte.index', compact('transportes'));
    }

    public function buscador(Request $request)
    {
        $this->autorizacion('Encargado');

        $transportes = Transporte::all();
        $nombre = $request->texto;
        return view("transporte.buscar",compact('transportes', 'nombre'));        
    }

    public function create()
    {
        $this->autorizacion('Encargado');

        //$empresas =  Bus::whereNotIn('id',$bus_id)->select('empresa_id')->distinct()->get();
        $bus_id = Transporte::all()->pluck('bus_id');

        $empresa_id = Bus::whereNotIn('id',$bus_id)->select('empresa_id')->distinct()->pluck('empresa_id');
        $empresas = Empresa::whereIn('id', $empresa_id)->orderBy('nombre')->get();
        $buses = Bus::whereNotIn('id',$bus_id)->orderBy('tipo_bus')->get();
        $carriles = Carril::orderBy('carril')->get();
        $departamentos = Departamento::orderBy('destino')->get();
        
        return view('transporte.create', compact('buses', 'carriles', 'departamentos', 'empresas'));
    }

    public function store()
    {
        $this->autorizacion('Encargado');
   
        $transporte = new Transporte;
        //dd(request());
        $transporte->guardar(request());

        return redirect('transporte/nuevo')->with('good', 'Registro exitoso');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $this->autorizacion('Encargado');

        $transporte = Transporte::find($id);

        $bus_id = Transporte::all()->pluck('bus_id');
 
        $find_empresa = sizeof(Bus::whereNotIn('id', $bus_id)->select('empresa_id')->distinct()->where('empresa_id',$transporte->bus->empresa_id)->get());


        $empresa_id = Bus::whereNotIn('id',$bus_id)->select('empresa_id')->distinct()->pluck('empresa_id');
        $empresas = Empresa::whereIn('id', $empresa_id)->orderBy('nombre')->get();
        $buses = Bus::whereNotIn('id',$bus_id)->orderBy('tipo_bus')->get();


        return view('transporte.edit', compact('transporte', 'buses', 'empresas', 'find_empresa')); 
    }

    public function update(Transporte $transporte)
    {
        $this->autorizacion('Encargado');

        //dd(request());
        $new_trasporte = new Transporte;
        $new_trasporte->actualizar(request(), $transporte);
        return redirect('transporte')->with('good', 'Modificación exitosa');
    }

    public function destroy(Transporte $transporte)
    {
        $this->autorizacion('Encargado');

        $status ='Eliminación exitosa';
        try {
            $transporte->delete();
            return redirect('transporte')->with('good', $status);
        } catch (\Illuminate\Database\QueryException $e) {
            $status = 'Registro relacionado, imposible de eliminar';
        }
        return redirect('transporte')->with('err', $status);    
    }

}
