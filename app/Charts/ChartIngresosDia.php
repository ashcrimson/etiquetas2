<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Rema;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartIngresosDia extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $remas  = Rema::select(DB::raw('hour(created_at) hora,count(*) valor'))
            ->groupBy('hora')
            ->whereRaw("date(created_at) = ?",[fechaActual('en')])
            ->get();

        $labels = $remas->pluck('hora')->toArray();
        $valores = $remas->pluck('valor')->toArray();


        return Chartisan::build()
            ->labels($labels)
            ->dataset('Ingresos por hora', $valores);
    }
}
