<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Sunat\File;

/**
 * Description of USFie
 *
 * @author JEANPAPER
 */
class USFile {

    const PURCHASE_8 = '8';
    const SALE_14 = '14';
    //Especificos del PLE   
    const SALE_14_1 = '14.1';
    const SALE_14_2 = '14.2';
    const PURCHASE_8_1 = '8.1';
    const PURCHASE_8_2 = '8.2';
    const PURCHASE_8_3 = '8.3';

    /**
     * Determina si un código de libro es venta
     * @param string $p_s_file_code Código de libro
     * @return boolean
     */
    public static function isSale($p_s_file_code) {
        return in_array($p_s_file_code, [self::SALE_14, self::SALE_14_1, self::SALE_14_2]);
    }

    /**
     * Determina si un código de libro es compra
     * @param string $p_s_file_code Código de libro
     * @return boolean
     */
    public static function isPurchase($p_s_file_code) {
        return in_array($p_s_file_code, [self::PURCHASE_8, self::PURCHASE_8_1, self::PURCHASE_8_2, self::PURCHASE_8_3]);
    }

    /**
     * Determina si un código de libro es venta o compra
     * @param string $p_s_file_code Código de libro
     * @return boolean
     */
    public static function isSaleOrPurchase($p_s_file_code) {
        return in_array($p_s_file_code, [self::SALE_14, self::SALE_14_1, self::SALE_14_2, self::PURCHASE_8, self::PURCHASE_8_1, self::PURCHASE_8_2, self::PURCHASE_8_3]);
    }

}
