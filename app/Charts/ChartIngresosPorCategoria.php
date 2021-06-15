<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\PacienteAtencion;
use App\Models\Rema;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartIngresosPorCategoria extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $remas  = PacienteAtencion::select(DB::raw('clasificacion_triaje,count(*) valor'))
            ->groupBy('clasificacion_triaje')
            ->whereMonth("created_at",date('m'))
            ->get();

        $labels = $remas->pluck('clasificacion_triaje')->toArray();
        $valores = $remas->pluck('valor')->toArray();


        return Chartisan::build()
            ->labels($labels)
            ->dataset('Ingresos por mes', $valores);
    }
}
