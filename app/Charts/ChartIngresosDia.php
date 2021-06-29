<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Rema;
use Carbon\Carbon;
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

        $remas  = Rema::select(DB::raw('extract(hour from created_at) as hora,count(*) as valor'))
            ->groupByRaw('extract(hour from created_at)')
            ->whereDate("created_at",Carbon::today()->toDateString())
            ->get();

        $labels = $remas->pluck('hora')->toArray();
        $valores = $remas->pluck('valor')->toArray();


        return Chartisan::build()
            ->labels($labels)
            ->dataset('Ingresos por hora', $valores);
    }
}
