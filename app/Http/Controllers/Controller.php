<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // FUNÇÃO PARA FORMATAR URL PARA URL AMIGÁVEL
    public static function cleanUrl($string)
    {
        $table = array(

            '/' => '', '(' => '', ')' => '',

        );

        $string = strtr($string, $table);

        $string = preg_replace(array("/(á|à|ã|â|ä)/", "/(Á|À|Ã|Â|Ä)/", "/(é|è|ê|ë)/", "/(É|È|Ê|Ë)/", "/(í|ì|î|ï)/", "/(Í|Ì|Î|Ï)/", "/(ó|ò|õ|ô|ö)/", "/(Ó|Ò|Õ|Ô|Ö)/", "/(ú|ù|û|ü)/", "/(Ú|Ù|Û|Ü)/", "/(ñ)/", "/(Ñ)/"), explode(" ", "a A e E i I o O u U n N"), $string);

        $string = preg_replace('/[,.;:`´^~\'"]/', null, iconv('UTF-8', 'ASCII//TRANSLIT', $string));

        $string = strtolower($string);

        $string = str_replace("ç", "c", $string);

        $string = str_replace("?", " ", $string);

        $string = str_replace(" ", "-", $string);

        $string = str_replace("---", "-", $string);

        return $string;
    }

    // FUNÇÃO PARA EXIBIR O TEMPO CORRIDO
    public static function runningTime($dateTime)
    {
        // data e hora atual
        $now = strtotime(date('Y/m/d H:i:s'));
        $time = strtotime($dateTime);
        $diff = $now - $time;

        // quebrando
        $seconds = $diff;
        $minutes = round($diff / 60);
        $hours = round($diff / 3600);
        $days = round($diff / 86400);
        $weeks = round($diff / 604800);
        $months = round($diff / 2419200);
        $years = round($diff / 29030400);

        // exibindo a diferencia de tempo
        if ($seconds <= 60) return "1 min atrás";
        else if ($minutes <= 60) return $minutes == 1 ? '1 min atrás' : $minutes . ' min atrás';
        else if ($hours <= 24) return $hours == 1 ? '1 hrs atrás' : $hours . ' hrs atrás';
        else if ($days <= 7) return $days == 1 ? '1 dia atras' : $days . ' dias atrás';
        else if ($weeks <= 4) return $weeks == 1 ? '1 semana atrás' : $weeks . ' semanas atrás';
        else if ($months <= 12) return $months == 1 ? '1 mês atrás' : $months . ' meses atrás';
        else return $years == 1 ? 'um ano atrás' : $years . ' anos atrás';
    }
}
