<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Aws;

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

/**
 * Description of USAwsS3
 *
 * @author JEANPAPER
 */
class USAwsS3 {

    public static function loadByProfile($p_s_profile, $p_s_region, $p_s_version) {

        require_once dirname(__FILE__) . '/../../vendor/autoload.php';

        return new S3Client([
            'profile' => $p_s_profile,
            'version' => $p_s_version,
            'region' => $p_s_region
        ]);
    }

    public static function loadByHardcode($p_s_key, $p_s_secret, $p_s_region, $p_s_version) {

        require_once dirname(__FILE__) . '/../vendor/autoload.php';

        return new S3Client([
            'version' => $p_s_version,
            'region' => $p_s_region,
            'credentials' => [
                'key' => $p_s_key,
                'secret' => $p_s_secret,
            ],
        ]);
    }

}
