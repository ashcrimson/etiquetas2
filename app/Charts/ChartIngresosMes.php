<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Rema;
use Carbon\Carbon;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartIngresosMes extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $iniMes = Carbon::now()->firstOfMonth();
        $finMes = Carbon::now()->lastOfMonth();

        $dias = $iniMes->diffInDays($finMes)+1;


        $remas  = Rema::select(DB::raw('extract(day from created_at) as dia,count(*) as valor'))
            ->groupByRaw('extract(day from created_at)')
            ->whereMonth("created_at",date('m'))
            ->get();

        $labels = [];

        for ($dia=1;$dia<=$dias;$dia++){

            $labels[$dia] = $remas->where('dia',$dia)->first()->valor ?? 0;
        }


        return Chartisan::build()
            ->labels(array_keys($labels))
            ->dataset('Ingresos por mes', array_values($labels));
    }
}
