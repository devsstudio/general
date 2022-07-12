<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Sunat\Table;

use US\Helpers\USRegex;

/**
 * Description of USTable2
 *
 * @author JEANPAPER
 */
class USTable02 {

    const DOC_1 = '1';
    const DOC_4 = '4';
    const DOC_6 = '6';
    const DOC_7 = '7';
    const DOC_A = 'A';
    const DOC_0 = '0';

    public static function validateCode($p_s_code) {
        return in_array((string) $p_s_code, [self::DOC_1, self::DOC_4, self::DOC_6, self::DOC_7, self::DOC_A, self::DOC_0]);
    }

    public static function validateNumber($p_s_code, $p_s_number) {

        switch ($p_s_code) {
            case self::DOC_1:
                return USRegex::integer($p_s_number, 8, 8);
            case self::DOC_4:
                return USRegex::alphanumeric($p_s_number, 1, 12);
            case self::DOC_6:
                return USRegex::integer($p_s_number, 11, 11);
            case self::DOC_7:
                return USRegex::alphanumeric($p_s_number, 1, 12);
            case self::DOC_A:
                return USRegex::alphanumeric($p_s_number, 1, 12);
            case self::DOC_0:
                return USRegex::alphanumeric($p_s_number, 1, 15);
            default:
                return false;
        }
    }

    public static function getItems() {
        return [
            self::DOC_1 => 'DNI',
            self::DOC_4 => 'Carnet de extranjería',
            self::DOC_6 => 'RUC',
            self::DOC_7 => 'Pasaporte',
            self::DOC_A => 'Cedula diplomática de identidad',
            self::DOC_0 => 'Otro',
        ];
    }

    public static function getName($p_s_value) {
        return self::getItems()[$p_s_value];
    }

    public static function getSQLCase($p_s_field) {

        $s_sql = "CASE {$p_s_field} ";
        foreach (self::getItems() as $s_key => $s_value) {
            $s_sql .= "WHEN '{$s_key}' THEN '{$s_value}' ";
        }
        $s_sql .= "END";

        return $s_sql;
    }

}
