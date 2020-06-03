<?php

namespace App\Exports;

use App\Viaje;
//use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class ViajesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    /*private $request;

    public function __construct($req)
    {
        $this->request = $req;
    }*/

    public function view(): View
    {
        $fecha_actual = request()->fecha_actual;
        if ($fecha_actual != null) {
            $viajes = Viaje::select()
                ->whereDate('fecha', Carbon::today()
                ->format('Y-m-d'))
                ->get();
        } else {
            $registros = request()->registros;

            if($registros != null){
                $viajes = Viaje::all();
            } else {
                $fecha = request()->fecha;
                $fecha_inicio = request()->fecha_inicio;
                $fecha_fin = request()->fecha_fin;
                if ($fecha != 0){
                    $viajes = Viaje::whereYear('created_at',$fecha)
                            ->whereMonth('created_at',substr($fecha, -2))
                            ->get(); 
                } else {
                    if ($fecha_inicio != 0){
                        if ($fecha_fin != 0){
                            $viajes = Viaje::whereDate('created_at','>=',$fecha_inicio)
                                ->whereDate('created_at', '<=', $fecha_fin)
                                ->get();
                        } else {
                            $viajes = Viaje::whereDate('created_at',$fecha_inicio)
                                ->get();
                        }
                    } else {
                        $viajes = Viaje::whereDate('created_at',$fecha_fin)
                            ->get();
                    }
                }
            }
        }
        
        return view('reporte.exportar', [
            'viajes' => $viajes
        ]);
    }

    /*public function collection()
    {
        return Viaje::all();
    }*/
}
