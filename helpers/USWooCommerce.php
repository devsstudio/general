<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers;

use Automattic\WooCommerce\Client;

/**
 * Description of USWooCommerce
 *
 * @author JEANPAPER
 */
class USWooCommerce {

    public static function load($p_s_url, $p_s_consumer_key, $p_s_consumer_secret, array $p_a_options = []) {

        require_once dirname(__FILE__) . '/../vendor/autoload.php';

        return new Client(
                $p_s_url,
                $p_s_consumer_key,
                $p_s_consumer_secret,
                $p_a_options
        );
    }

}
