<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleChart1 extends BaseChart
{
  
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['Exemplo 1', 'Exemplo 2', 'Exemplo 3'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}