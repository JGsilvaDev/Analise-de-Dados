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
            ->labels(['Exemplo 1', 'Exemplo 2', 'Exemplo 3', 'Exemplo 4', 'Exemplo 5' , 'Exemplo 6', 'Exemplo 7'])
            ->dataset('Sample', [1, 2, 3,4,5,6,7])
            ->dataset('Sample 2', [7,6,5,4,3, 2, 1])
            ->dataset('Sample 3', [8,9,10,2,5, 3, 4])
            ->dataset('Sample 4', [7,5,3,4,9,1 ]);
    }
}