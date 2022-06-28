<?php

namespace App\Helpers;

use App\Models\Vacataire;

class Helper
{
    public static function IDGenerator($recouvrements, $trow, $lenght = 4, $prefix)
    {
        $data = $recouvrements::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_lenght = $lenght;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actial_last_number = ($code / 1) * 1;
            $increment_last_number = $actial_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_lenght = $lenght - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_lenght; $i++) {
            $zeros .= "0";
        }
        return $prefix . '-' . $zeros . $last_number;
    }

    public static function MatriculeVac($vacataires, $trow, $lenght = 3, $prefix)
    {
        $data = $vacataires::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_lenght = $lenght;
            $last_number = '';
        } else {
            $code = substr($data->$trow, strlen($prefix) + 1);
            $actial_last_number = ($code / 1) * 1;
            $increment_last_number = $actial_last_number + 1;
            $last_number_length = strlen($increment_last_number);
            $og_lenght = $lenght - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_lenght; $i++) {
            $zeros .= "0";
        }
        return $prefix . $zeros . $last_number;
    }
}
