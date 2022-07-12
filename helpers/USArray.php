<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

/**
 * Description of USArray
 *
 * @author JEANPAUL
 */
class USArray {

    /**
     * Determina si un aray es asociativo
     * @param array $p_a_array Array
     * @return boolean Es asociativo o no
     */
    public static function isAssoc($p_a_array) {
        return array_keys($p_a_array) !== range(0, count($p_a_array) - 1);
    }

    /**
     * Inserta valores después de la primera ocurrencia del array
     * @param array $p_a_array Array original
     * @param mixed $p_m_value Valor a buscar
     * @param array $p_a_insert Valores a insertar
     */
    public static function insertAfter(&$p_a_array, $p_m_value, $p_a_insert) {
        $i_position = array_search($p_m_value, $p_a_array);

        if ($i_position !== false) {
            array_splice($p_a_array, $i_position + 1, 0, $p_a_insert); // splice in at position 3
        }
    }

}
