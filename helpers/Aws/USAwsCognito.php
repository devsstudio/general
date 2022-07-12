<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Aws;

use Aws\CognitoIdentityProvider\CognitoIdentityProviderClient;
use Aws\Exception\AwsException;

/**
 * Description of USAwsCognito
 *
 * @author JEANPAPER
 */
class USAwsCognito {


    public static function init($p_s_profile, $p_s_region, $p_s_version) {
        require_once dirname(__FILE__) . '/../../vendor/autoload.php';

        return new CognitoIdentityProviderClient([
            'profile' => $p_s_profile,
            'region' => $p_s_region,
            'version' => $p_s_version
        ]);
    }

}
