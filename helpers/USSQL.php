<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

/**
 * Description of USDB
 *
 * @author JEANPAPER
 */
class USSQL {

    public static function getCase($p_s_column, array $p_a_array) {
        $a_parts = [];
        foreach ($p_a_array as $s_key => $s_value) {
            $a_parts[] = "WHEN '" . $s_key . "' THEN '" . $s_value . "'";
        }
        return "(CASE {$p_s_column} " . implode(' ', $a_parts) . " END)";
    }

}
