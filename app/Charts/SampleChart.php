<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class SampleChart extends BaseChart
{
    public function handler(Request $request): Chartisan
    {

        
        $regioes = (isset($_POST['Nome']))? $_POST['Nome']: '';
        $capitais = (isset($_POST['Nome_Capitais']))? $_POST['Nome_Capitais']: '';
        $filtro = (isset($_POST['TipoTabela']))? $_POST['TipoTabela']: '';

        $tabela1 = DB::table('nome_tabelas')
                    ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
                    ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
                    ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',5]])
                    ->where('tabela1__regiao_estado.Regiao','=', 'Sudeste')
                    ->where('tabela1__regiao_estado.Nome','=', 'Sao Paulo')
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela1__regiao_estado.Regiao','ASC')
                    ->first();

        $top3Tabela1 = DB::table('nome_tabelas')
                    ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
                    ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
                    ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',5]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela1__regiao_estado.Total','DESC')
                    ->limit(3)
                    ->get();

        $array = $top3Tabela1->toArray();

        //if($filtro = 1){
            return Chartisan::build()
            ->labels([$tabela1->Nome, $array[0]->Nome, $array[1]->Nome,$array[2]->Nome])
            ->dataset($tabela1->Nome, [str_replace(',','.',$tabela1->Total),
                                       str_replace(',','.',$array[0]->Total),str_replace(',','.',$array[1]->Total),
                                       str_replace(',','.',$array[2]->Total)]);
            

        /*}elseif($filtro = 2){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }elseif($filtro = 3){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }elseif($filtro = 4){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }elseif($filtro = 5){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }elseif($filtro = 6){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }elseif($filtro = 7){
            return Chartisan::build()
            ->labels($tabela1->nome_tabelas)
            ->dataset($nome, [$tabela1->Total])
            ->dataset($top3Tabela1[0]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[1]->Nome, [$top3Tabela1->Total])
            ->dataset($top3Tabela1[2]->Nome, [$top3Tabela1->Total]);

        }*/
        
    }
}