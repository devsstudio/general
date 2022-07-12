<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

use US\Classes\USStatusCode;

/**
 * Description of USMigo
 *
 * @author JeanPerea
 */
class USMigo
{

    public static function getRUCData($p_s_token, $p_s_ruc)
    {

        $a_data = [
            'token' => $p_s_token,
            'ruc' => $p_s_ruc
        ];

        return self::get("https://api.migo.pe/api/v1/ruc", $a_data);
    }

    public static function getDNIData($p_s_token, $p_s_dni)
    {

        $a_data = [
            'token' => $p_s_token,
            'dni' => $p_s_dni
        ];

        return self::get("https://api.migo.pe/api/v1/dni", $a_data);
    }

    public static function get($p_s_url, $p_a_data)
    {

        $o_curl = curl_init();

        $a_post_data = http_build_query($p_a_data);

        curl_setopt_array($o_curl, array(
            CURLOPT_URL => $p_s_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $a_post_data,
        ));

        $s_response = curl_exec($o_curl);
        $s_err = curl_error($o_curl);

        curl_close($o_curl);

        if ($s_err) {
            return [
                'code' => USStatusCode::CODE_INTERNAL_SERVER_ERROR,
                'message' => $s_err,
            ];
        } else {
            $a_response = (array) json_decode($s_response);

            if (count($a_response) > 0) {

                if ($a_response['success']) {
                    return [
                        'code' => USStatusCode::CODE_OK,
                        'message' => "Éxito",
                        'data' => $a_response
                    ];
                } else {
                    return [
                        'code' => USStatusCode::CODE_NOT_FOUND,
                        'message' => $a_response['message'],
                    ];
                }
            } else {
                return [
                    'code' => USStatusCode::CODE_NOT_FOUND,
                    'message' => 'No se encontraron resultados',
                ];
            }
        }
    }
}
