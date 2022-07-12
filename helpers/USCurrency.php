<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

/**
 * Description of USCurrency
 *
 * @author JEANPAPER
 */
class USCurrency {

    const PEN = 'PEN';
    const USD = 'USD';
    //
    const PEN_NAME = 'Soles';
    const USD_NAME = 'Dólares';

    public static function getValues() {
        return [
            self::PEN, self::USD
        ];
    }

    public static function getItems() {
        return [
            self::PEN => self::PEN_NAME,
            self::USD => self::USD_NAME
        ];
    }

    public static function getName($p_s_currency) {
        switch ($p_s_currency) {
            case self::PEN:
                return self::PEN_NAME;
            case self::USD:
                return self::USD_NAME;
            default:
                return null;
        }
    }

    public static function getSQLCase($p_s_field) {
        return "(CASE {$p_s_field} " .
                "WHEN '" . self::PEN . "' THEN '" . self::PEN_NAME . "' " .
                "WHEN '" . self::USD . "' THEN '" . self::USD_NAME . "' " .
                "ELSE NULL " .
                "END)";
    }

}
