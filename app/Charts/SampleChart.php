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

        //dd($regioes,$capitais,$filtro);

        //PRIMEIRO TEMA
        $tabela1 = DB::table('nome_tabelas')
                    ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
                    ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
                    ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',6]])
                    ->where('tabela1__regiao_estado.Regiao','=', 'Sudeste')
                    ->where('tabela1__regiao_estado.Nome','=', 'Sao Paulo')
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela1__regiao_estado.Regiao','ASC')
                    ->first();

        $top1Tabela1 = DB::table('nome_tabelas')
                    ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
                    ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
                    ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela1__regiao_estado.Total','DESC')
                    ->first();

        $ultimoTabela1 = DB::table('nome_tabelas')
                    ->select('tabela1__regiao_estado.Nome','tabela1__regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela1__regiao_estado.Regiao')
                    ->join('tabela1__total_capitais','tabela1__total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela1__regiao_estado','tabela1__regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela1__capitais','tabela1__capitais.Estado','=','tabela1__regiao_estado.Regiao')
                    ->where([['tabela1__regiao_estado.Nome','!=','Brasil'],['tabela1__regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela1__regiao_estado.Total','asc')
                    ->first(); 
         
        //SEGUNDO TEMA
        $tabela2 = DB::table('nome_tabelas')
                    ->select('tabela2_regiao_estado.Nome','tabela2_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela2_regiao_estado.Regiao')
                    ->join('tabela2_total_capitais','tabela2_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela2_regiao_estado','tabela2_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela2__capitais','tabela2__capitais.Estado','=','tabela2_regiao_estado.Regiao')
                    ->where([['tabela2_regiao_estado.Nome','!=','Brasil'],['tabela2_regiao_estado.id','>',6]])
                    ->where('tabela2_regiao_estado.Regiao','=', 'Sudeste')
                    ->where('tabela2_regiao_estado.Nome','=', 'Sao Paulo')
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela2_regiao_estado.Total','asc')
                    ->first();

        $top1Tabela2 = DB::table('nome_tabelas')
                    ->select('tabela2_regiao_estado.Nome','tabela2_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela2_regiao_estado.Regiao')
                    ->join('tabela2_total_capitais','tabela2_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela2_regiao_estado','tabela2_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela2__capitais','tabela2__capitais.Estado','=','tabela2_regiao_estado.Regiao')
                    ->where([['tabela2_regiao_estado.Nome','!=','Brasil'],['tabela2_regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela2_regiao_estado.Total','desc')
                    ->first();

        $ultimoTabela2 = DB::table('nome_tabelas')
                    ->select('tabela2_regiao_estado.Nome','tabela2_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela2_regiao_estado.Regiao')
                    ->join('tabela2_total_capitais','tabela2_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela2_regiao_estado','tabela2_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela2__capitais','tabela2__capitais.Estado','=','tabela2_regiao_estado.Regiao')
                    ->where([['tabela2_regiao_estado.Nome','!=','Brasil'],['tabela2_regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela2_regiao_estado.Total','ASC')
                    ->first();          

        //TERCEIRO TEMA
        $tabela3 = DB::table('nome_tabelas')
                    ->select('tabela3_regiao_estado.Nome','tabela3_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela3_regiao_estado.Regiao')
                    ->join('tabela3_total_capitais','tabela3_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela3_regiao_estado','tabela3_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela3_capitais','tabela3_capitais.Estado','=','tabela3_regiao_estado.Regiao')
                    ->where([['tabela3_regiao_estado.Nome','!=','Brasil'],['tabela3_regiao_estado.id','>',6]])
                    ->where('tabela3_regiao_estado.Regiao','=', 'Sudeste')
                    ->where('tabela3_regiao_estado.Nome','=', 'Sao Paulo')
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela3_regiao_estado.Total','asc')
                    ->first();

        $top1Tabela3 = DB::table('nome_tabelas')
                    ->select('tabela3_regiao_estado.Nome','tabela3_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela3_regiao_estado.Regiao')
                    ->join('tabela3_total_capitais','tabela3_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela3_regiao_estado','tabela3_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela3_capitais','tabela3_capitais.Estado','=','tabela3_regiao_estado.Regiao')
                    ->where([['tabela3_regiao_estado.Nome','!=','Brasil'],['tabela3_regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela3_regiao_estado.Total','desc')
                    ->first();

        $ultimoTabela3 = DB::table('nome_tabelas')
                    ->select('tabela3_regiao_estado.Nome','tabela3_regiao_estado.Total','nome_tabelas.nome_tabelas as Tabela','tabela3_regiao_estado.Regiao')
                    ->join('tabela3_total_capitais','tabela3_total_capitais.Nome_Tabela','like','nome_tabelas.nome_tabelas')
                    ->join('tabela3_regiao_estado','tabela3_regiao_estado.Nome_tabela','=','nome_tabelas.nome_tabelas')
                    ->join('tabela3_capitais','tabela3_capitais.Estado','=','tabela3_regiao_estado.Regiao')
                    ->where([['tabela3_regiao_estado.Nome','!=','Brasil'],['tabela3_regiao_estado.id','>',6]])
                    ->groupByRaw('1, 3, 4, 2')
                    ->orderBy('tabela3_regiao_estado.Total','asc')
                    ->first();

        //$array = $top3Tabela1->toArray();
        
        //if($filtro == 1){
            if($ultimoTabela1->Nome == $tabela1->Nome){
                return Chartisan::build()
                ->labels([$top1Tabela1->Nome,$tabela1->Nome])
                ->dataset($tabela1->Tabela, [str_replace(',','.',$top1Tabela1->Total),
                                             str_replace(',','.',$tabela1->Total)]);                           

            }elseif($top1Tabela1->Nome == $tabela1->Nome){
                return Chartisan::build()
                ->labels([$tabela1->Nome,$ultimoTabela1->Nome])
                ->dataset($tabela1->Tabela, [str_replace(',','.',$top1Tabela2->Total),
                                             str_replace(',','.',$top1Tabela3->Total)]);

            }else{
                return Chartisan::build()
                ->labels([$top1Tabela1->Nome,$tabela1->Nome])
                ->dataset($tabela1->Tabela, [str_replace(',','.',$top1Tabela1->Total),
                                             str_replace(',','.',$tabela1->Total),
                                             str_replace(',','.',$ultimoTabela1->Total)]);                            
            }

        /*}elseif($filtro == 2){
            if($ultimoTabela2->Nome == $tabela2->Nome){
                return Chartisan::build()
                ->labels([$top1Tabela2->Nome,$tabela2->Nome])
                ->dataset($tabela2->Tabela, [str_replace(',','.',$top1Tabela2->Total),
                                             str_replace(',','.',$tabela2->Total)]);                           

            }elseif($top1Tabela2->Nome == $tabela2->Nome){
                return Chartisan::build()
                ->labels([$tabela2->Nome,$ultimoTabela2->Nome])
                ->dataset($tabela2->Tabela, [str_replace(',','.',$top1Tabela2->Total),
                                             str_replace(',','.',$top1Tabela2->Total)]);

            }else{
                return Chartisan::build()
                ->labels([$top1Tabela2->Nome,$tabela2->Nome])
                ->dataset($tabela2->Tabela, [str_replace(',','.',$top1Tabela2->Total),
                                             str_replace(',','.',$tabela2->Total),
                                             str_replace(',','.',$ultimoTabela2->Total)]);                            
            }

        }elseif($filtro == 3){
            if($ultimoTabela3->Nome == $tabela3->Nome){
                return Chartisan::build()
                ->labels([$top1Tabela3->Nome,$tabela2->Nome])
                ->dataset($tabela3->Tabela, [str_replace(',','.',$top1Tabela3->Total),
                                             str_replace(',','.',$tabela3->Total)]);                           

            }elseif($top1Tabela3->Nome == $tabela3->Nome){
                return Chartisan::build()
                ->labels([$tabela3->Nome,$ultimoTabela3->Nome])
                ->dataset($tabela3->Tabela, [str_replace(',','.',$top1Tabela3->Total),
                                             str_replace(',','.',$top1Tabela3->Total)]);

            }else{
                return Chartisan::build()
                ->labels([$top1Tabela3->Nome,$tabela3->Nome])
                ->dataset($tabela3->Tabela, [str_replace(',','.',$top1Tabela3->Total),
                                             str_replace(',','.',$tabela3->Total),
                                             str_replace(',','.',$ultimoTabela3->Total)]);                            
            }

        }*/
           
            
        
    }
}