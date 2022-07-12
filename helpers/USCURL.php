<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

/**
 * Description of USCURL
 *
 * @author JEANPAPER
 */
class USCURL {

    public static function addParameterToUrl($p_s_url, $p_s_key, $p_m_value) {
        return self::addParametersToUrl($p_s_url, [
                    $p_s_key => $p_m_value
        ]);
    }

    public static function addParametersToUrl($p_s_url, $p_a_params = []) {
        $s_char = parse_url($p_s_url, PHP_URL_QUERY) ? '&' : '?';
        return sprintf("%s{$s_char}%s", $p_s_url, http_build_query($p_a_params));
    }

    public static function processHeaders($p_a_headers) {
        $a_headers = [];
        foreach ($p_a_headers as $s_key => $s_value) {
            $a_headers[] = "{$s_key}: {$s_value}";
        }
        return $a_headers;
    }

}
