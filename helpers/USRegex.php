<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

/**
 * Description of USRegex
 *
 * @author JEANPAPER
 */
class USRegex {

    const OP_AND = 'AND';
    const OP_OR = 'OR';
    const OP_NOT = 'NOT';

    /**
     * Obtiene el regex que valida  que la cadena contenga solo números
     * @param integer $p_i_min_length Largo mínimo
     * @param integer $p_i_max_length Largo máximo
     * @return string Regex
     */
    public static function getInteger($p_i_min_length = 0, $p_i_max_length = 32) {
        return "/^[0-9]{{$p_i_min_length},{$p_i_max_length}}$/";
    }

    public static function integer($p_s_subject, $p_i_min_length = 0, $p_i_max_length = 32) {
        return preg_match(self::getInteger($p_i_min_length, $p_i_max_length), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida  que la cadena contenga cualquier caracter excepto alguno de la lista
     * @param array $p_a_except Caracteres no permitidos
     * @param integer $p_i_min_length Largo mínimo
     * @param integer $p_i_max_length Largo máximo
     * @return string Regex
     */
    public static function getAnyExcept(array $p_a_except, $p_i_min_length = 0, $p_i_max_length = 32) {
        return "/^[^" . implode('', $p_a_except) . "]{{$p_i_min_length},{$p_i_max_length}}$/";
    }

    public static function anyExcept($p_s_subject, array $p_a_except, $p_i_min_length = 0, $p_i_max_length = 32) {
        return preg_match(self::getAnyExcept($p_a_except, $p_i_min_length, $p_i_max_length), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena contenga solo números y letras
     * @param integer $p_i_min_length Largo mínimo
     * @param integer $p_i_max_length Largo máximo
     * @return string Regex
     */
    public static function getAlphanumeric($p_i_min_length = 0, $p_i_max_length = 32) {
        return "/^[0-9a-zA-Z]{{$p_i_min_length},{$p_i_max_length}}$/";
    }

    public static function alphanumeric($p_s_subject, $p_i_min_length, $p_i_max_length) {
        return preg_match(self::getAlphanumeric($p_i_min_length, $p_i_max_length), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena comienze con un prefijo determinado y el resto de caracteres sean solo números y letras
     * @param string $p_s_preffix Prefijo
     * @param integer $p_i_min_length Largo mínimo (no incluye el prefijo)
     * @param integer $p_i_max_length Largo máximo (no incluye el prefijo)
     * @return string Regex
     */
    public static function getPreffixedAlphanumeric($p_s_preffix, $p_i_min_length = 0, $p_i_max_length = 32) {
        return "/^{$p_s_preffix}([0-9a-zA-Z]{{$p_i_min_length},{$p_i_max_length}})$/";
    }

    public static function preffixedAlphanumeric($p_s_subject, $p_s_preffix, $p_i_min_length = 0, $p_i_max_length = 32) {
        return preg_match(self::getPreffixedAlphanumeric($p_s_preffix, $p_i_min_length, $p_i_max_length), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena sea una fecha en formato dd/MM/yyyy pero no valida que sea realmente una fecha posible
     * @return string Regex
     */
    public static function getDate() {
        return "#^(0[1-9]|[1-2][0-9]|3[0-1])\/(0[1-9]|1[0-2])\/[0-9]{4}$#";
    }

    public static function date($p_s_subject) {
        return preg_match(self::getDate(), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena sea alguna de las palabras especificadas
     * @param array $p_a_words
     * @return string Regex
     */
    public static function getIn(array $p_a_words) {
        return "/^" . implode('|', $p_a_words) . "$/";
    }

    public static function in($p_s_subject, array $p_a_words) {
        return preg_match(self::getIn($p_a_words), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena no sea ninguna de las palabras especificadas
     * @param array $p_a_words
     * @return string Regex
     */
    public static function getNotIn(array $p_a_words) {
        $a_normalized = [];
        foreach ($p_a_words as $s_word) {
            $a_normalized[] = "!" . $s_word;
        }

        return "/^" . implode('|', $a_normalized) . "$/";
    }

    public static function notIn($p_s_subject, array $p_a_words) {
        return preg_match(self::getNotIn($p_a_words), $p_s_subject);
    }

    /**
     * Obtiene el regex que verifica si una cadena está compuesta de puros ceros
     * @return string Regex
     */
    public static function getAllZeros() {
        return "/^0+$/";
    }

    public static function allZeros($p_s_subject) {
        return preg_match(self::getAllZeros(), $p_s_subject);
    }

    /**
     * Obtiene el regex que valida que la cadena sea alguna de las palabras especificadas excepto algunas
     * @param array $p_a_words
     * @return string Regex
     */
    public static function getInExcept(array $p_a_words, array $p_a_except) {

        foreach ($p_a_except as $s_except) {
            //Buscamos
            $i_found = array_search($s_except, $p_a_words);
            //Si es FALSE es porque no lo encontró
            if ($i_found === false) {
                $p_a_words[] = '!' . $s_except;
            } else {
                //Si existe removemos el elemento y reemplazamos por el elemento negado
                array_splice($p_a_words, $i_found, 1, ['!' . $s_except]);
            }
        }

        return self::in($p_a_words);
    }

    public static function inExcept($p_s_subject, array $p_a_words, array $p_a_except) {
        return preg_match(self::getInExcept($p_a_words, $p_a_except), $p_s_subject);
    }

    /**
     * Obtiene el regex que determina si una columna de excel es válida
     * @return string Regex
     */
    public static function getExcelColumn() {
        return "/^[A-Z]$|^[A-Z][A-Z]$|^[A-X][A-F][A-D]$/";
    }

    public static function excelColumn($p_s_subject) {
        return preg_match(self::getExcelColumn(), $p_s_subject);
    }

    /**
     * Obtiene el regex que determina si una columna de excel es válida
     * @return string Regex
     */
    public static function getEmptyOrBlank() {
        return "/^$/";
    }

    public static function emptyOrBlank($p_s_subject) {
        return preg_match(self::getEmptyOrBlank(), $p_s_subject);
    }

    /**
     * Obtiene el regex para evaluar números decimales
     * @param integer $p_i_decimals Número de decimales
     * @return string Regex
     */
    public static function getFloat($p_i_decimals = 2) {
        return "/^\d*(\.\d{{$p_i_decimals}})?$/";
    }

    public static function float($p_s_subject, $p_i_decimals = 2) {
        return preg_match(self::getFloat($p_i_decimals), $p_s_subject);
    }

    /**
     * Mezcla uno o más regex
     * @param array $p_a_regex Array de expresiones regulares
     * @param string $p_s_delimiter Delimitador de la expresión final
     * @return string Expresión regular combinada
     */
    public static function getMix(array $p_a_regex, $p_s_delimiter = "/") {
        $a_parts = [];
        foreach ($p_a_regex as $s_regex) {
            $a_parts[] = "^" . USString::capture("/\^(.*)[$]/", $s_regex) . "$";
        }

        return $p_s_delimiter . implode("|", $a_parts) . $p_s_delimiter;
    }

    public static function mix($p_s_subject, array $p_a_regex, $p_s_delimiter = "/") {
        return preg_match(self::getMix($p_a_regex, $p_s_delimiter), $p_s_subject);
    }

    /**
     * Analiza si una cadena es un numero mayor que zero y tiene un máximo de dígitos
     * @param string $p_s_subject Cadena a analizar
     * @param integer $p_i_length Máximo de dígitos
     * @param boolean $p_b_zerofill Llenado con zeros
     * @return boolean TRUE si cumple o FALSE si no
     */
    public static function numericMajorThanZero($p_s_subject, $p_i_length, $p_b_zerofill = false) {
        return self::integer($p_s_subject, ($p_b_zerofill ? $p_i_length : 1), $p_i_length) && !USRegex::allZeros($p_s_subject);
    }

}
