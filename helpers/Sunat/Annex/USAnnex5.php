<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Sunat\Annex;

use US\Helpers\USRegex;
use US\Helpers\Sunat\Table\USTable11;
use US\Helpers\Sunat\File\USFile;

/**
 * Description of USAnnex5
 *
 * @author JEANPAPER
 */
class USAnnex5 {

    /**
     * Obtiene los tipos de boletos a partir del Anexo 5 de SUNAT
     * @return array Array asociativo
     */
    public static function getTicketTypes() {
        return [
            1 => 'Boleto Manual',
            2 => 'Boleto Automático',
            3 => 'Boleto Electrónico',
            4 => 'Otros',
            5 => 'Anulado'
        ];
    }

    /**
     * Obtiene los tipos de boletos BVME a partir del Anexo 5 de SUNAT
     * @return array Array asociativo
     */
    public static function getBVMETicketTypes() {
        return [
            1 => 'Boleto Pre-Impreso',
            2 => 'Boleto Electrónico',
            5 => 'Anulado'
        ];
    }

    public static function getRules() {
        return [
            '00' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_2, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '01' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '02' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 9],
                ]
            ],
            '03' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 9],
                ],
            ],
            '04' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '05' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '06' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '07' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '08' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '09' => [
                'sale' => false,
                'purchase' => false
            ],
            '10' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 9],
                ]
            ],
            '11' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '12' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1, USFile::SALE_14_2],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '13' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '14' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '15' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '16' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '17' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '18' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '19' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 9],
                ],
            ],
            '20' => [
                'sale' => false,
                'purchase' => false
            ],
            '21' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 9]
                ],
            ],
            '22' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 9],
                ]
            ],
            '23' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '24' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '25' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '26' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '27' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '28' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '29' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '30' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '31' => [
                'sale' => false,
                'purchase' => false
            ],
            '32' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '33' => [
                'sale' => false,
                'purchase' => false
            ],
            '34' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '35' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '36' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '37' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '40' => [
                'sale' => false,
                'purchase' => false
            ],
            '41' => [
                'sale' => false,
                'purchase' => false
            ],
            '42' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '43' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '44' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 9],
                ],
            ],
            '45' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 9],
                ],
            ],
            '46' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '48' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '49' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 9],
                ],
            ],
            '50' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ]
            ],
            '51' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ]
            ],
            '52' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ]
            ],
            '53' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ]
            ],
            '54' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ]
            ],
            '55' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '56' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [0, 1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '87' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '88' => [
                'sale' => [
                    'on' => [USFile::SALE_14_1],
                    'states' => [1, 2, 8, 9],
                ],
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '89' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '91' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_2],
                    'states' => [0, 9],
                ],
            ],
            '96' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_1, USFile::PURCHASE_8_3],
                    'states' => [0, 1, 6, 7, 9],
                ],
            ],
            '97' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_2],
                    'states' => [0, 9],
                ],
            ],
            '98' => [
                'sale' => false,
                'purchase' => [
                    'on' => [USFile::PURCHASE_8_2],
                    'states' => [0, 9],
                ],
            ],
        ];
    }

    public static function validateDocumentCode($p_s_file_code, $p_s_document_code) {
        $a_rules = self::getRules();
        //Existe??
        if (isset($a_rules[$p_s_document_code])) {
            //SI existe buscados si es compra o venta
            if (USFile::isSale($p_s_file_code)) {
                return $a_rules[$p_s_document_code]['sale'] !== false &&
                        count($a_rules[$p_s_document_code]['sale']) > 0;
            } elseif (USFile::isPurchase($p_s_file_code)) {
                return $a_rules[$p_s_document_code]['purchase'] !== false &&
                        count($a_rules[$p_s_document_code]['purchase']) > 0;
            }
        }

        return false;
    }

    public static function validateDocument($p_s_file_code, $p_s_document_code, $p_i_state) {
        $a_rules = self::getRules();
        //Existe??
        if (isset($a_rules[$p_s_document_code])) {
            //SI existe buscados si es compra o venta
            if (USFile::isSale($p_s_file_code)) {
                return $a_rules[$p_s_document_code]['sale'] !== false &&
                        in_array($p_s_file_code, $a_rules[$p_s_document_code]['sale']['on']) &&
                        (isset($p_i_state) ? in_array($p_i_state, $a_rules[$p_s_document_code]['sale']['states']) : true);
            } elseif (USFile::isPurchase($p_s_file_code)) {
                return $a_rules[$p_s_document_code]['purchase'] !== false &&
                        in_array($p_s_file_code, $a_rules[$p_s_document_code]['purchase']['on']) &&
                        (isset($p_i_state) ? in_array($p_i_state, $a_rules[$p_s_document_code]['purchase']['states']) : true);
            }
        }

        return false;
    }

    public static function validateSerie($p_s_file_code, $p_s_document_code, $p_s_document_serie, $p_b_electronic = false) {

        $a_ticket_keys = array_keys(self::getTicketTypes());
        $a_table11_keys = array_keys(USTable11::getItems());
        $a_bvme_ticket_keys = array_keys(self::getBVMETicketTypes());

        switch ($p_s_document_code) {
            case '00':
                return USRegex::alphanumeric($p_s_document_serie, 0, 20);
            case '01':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::in($p_s_document_serie, ['E001']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'F', 3, 3);
                    } else {
                        return USRegex::integer($p_s_document_serie, 4, 4);
                    }
                } else {
                    return false;
                }
            case '02':
                if (USFile::isPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::in($p_s_document_serie, ['E001']);
                    } else {
                        return USRegex::integer($p_s_document_serie, 4, 4);
                    }
                } else {
                    return false;
                }
            case '03':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::in($p_s_document_serie, ['EB01']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'B', 3, 3);
                    } else {
                        return USRegex::integer($p_s_document_serie, 4, 4);
                    }
                } else {
                    return false;
                }
            case '04':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::in($p_s_document_serie, ['E001']);
                    } else {
                        return USRegex::integer($p_s_document_serie, 4, 4);
                    }
                } else {
                    return false;
                }
            case '05':
                if (USFile::isSale($p_s_file_code)) {
                    return USRegex::in($p_s_document_serie, $a_ticket_keys);
                } elseif (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::inExcept($p_s_document_serie, $a_ticket_keys, [5]);
                } else {
                    return false;
                }
            case '06':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_serie, 4, true);
                } else {
                    return false;
                }
            case '07':
            case '08':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::in($p_s_document_serie, ['E001', 'EB01']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'F', 3, 3) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'B', 3, 3);
                    } else {
                        return USRegex::integer($p_s_document_serie, 4, 4);
                    }
                } else {
                    return false;
                }
            case '09':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '10':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::in($p_s_document_serie, ['1683']);
                } else {
                    return false;
                }
            case '11':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '12':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 1, 20);
                } else {
                    return false;
                }
            case '13':
            case '14':
            case '15':
            case '16':
            case '17':
            case '18':
            case '19':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '20':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '21':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '22':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::in($p_s_document_serie, ['0820']);
                } else {
                    return false;
                }
            case '23':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_serie, 4, 4);
                } else {
                    return false;
                }
            case '24':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '25':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_serie, 4, 4);
                } else {
                    return false;
                }
            case '26':
            case '27':
            case '28':
            case '29':
            case '30':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '31':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '32':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '33':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '34':
            case '35':
            case '36':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_serie, 4, 4);
                } else {
                    return false;
                }
            case '37':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '40':
            case '41':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '42':
            case '43':
            case '44':
            case '45':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '46':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_serie, 4, 4);
                } else {
                    return false;
                }
            case '48':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_serie, 4, true);
                } else {
                    return false;
                }
            case '49':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '50':
            case '51':
            case '52':
            case '53':
            case '54':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::in($p_s_document_serie, $a_table11_keys);
                } else {
                    return false;
                }
            case '55':
                if (USFile::isSale($p_s_file_code)) {
                    return USRegex::in($p_s_document_serie, $a_bvme_ticket_keys);
                } elseif (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::inExcept($p_s_document_serie, $a_bvme_ticket_keys, [5]);
                } else {
                    return false;
                }
            case '56':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_serie, 4, true);
                } else {
                    return false;
                }
            case '87':
            case '88':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            case '89':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_serie, 4, true);
                } else {
                    return false;
                }
            case '91':
            case '96':
            case '97':
            case '98':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_serie, 0, 20);
                } else {
                    return false;
                }
            default:
                return false;
        }
    }

    public static function validateCorrelative($p_s_file_code, $p_s_document_code, $p_s_document_serie, $p_s_document_correlative, $p_b_electronic = false) {
        switch ($p_s_document_code) {
            case '00':
                return USRegex::alphanumeric($p_s_document_correlative, 1, 20);
            case '01':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 8);
                } else {
                    return false;
                }
                break;
            case '02':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '03':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 8);
                } else {
                    return false;
                }
                break;
            case '04':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    if ($p_b_electronic) {
                        return USRegex::numericMajorThanZero($p_s_document_correlative, 8);
                    } else {
                        return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                    }
                } else {
                    return false;
                }
                break;
            case '05':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 11);
                } else {
                    return false;
                }
                break;
            case '06':
            case '07':
            case '08':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 8);
                } else {
                    return false;
                }
                break;
            case '09':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '10':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_correlative, 1, 20);
                } else {
                    return false;
                }
                break;
            case '11':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 15);
                } else {
                    return false;
                }
                break;
            case '12':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '13':
            case '14':
            case '15':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_correlative, 1, 20) && !USRegex::allZeros($p_s_document_correlative);
                } else {
                    return false;
                }
                break;
            case '16':
            case '17':
            case '18':
            case '19':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '20':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '21':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_correlative, 1, 20) && !USRegex::allZeros($p_s_document_correlative);
                } else {
                    return false;
                }
                break;
            case '22':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_correlative, 1, 20);
                } else {
                    return false;
                }
                break;
            case '23':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '24':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_correlative, 1, 20) && !USRegex::allZeros($p_s_document_correlative);
                } else {
                    return false;
                }
                break;
            case '25':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '26':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_correlative, 1, 20) && !USRegex::allZeros($p_s_document_correlative);
                } else {
                    return false;
                }
                break;
            case '27':
            case '28':
            case '29':
            case '30':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '31':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '32':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '33':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '34':
            case '35':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '36':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 8);
                } else {
                    return false;
                }
                break;
            case '37':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '40':
            case '41':
                return !USFile::isSaleOrPurchase($p_s_file_code);
            case '42':
            case '43':
            case '44':
            case '45':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '46':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::integer($p_s_document_correlative, 1, 20);
                } else {
                    return false;
                }
                break;
            case '48':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '49':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '50':
            case '51':
            case '52':
            case '53':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 6);
                } else {
                    return false;
                }
                break;
            case '54':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '55':
            case '56':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 11);
                } else {
                    return false;
                }
                break;
            case '87':
            case '88':
                if (USFile::isSaleOrPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 20);
                } else {
                    return false;
                }
                break;
            case '89':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::numericMajorThanZero($p_s_document_correlative, 7);
                } else {
                    return false;
                }
                break;
            case '91':
            case '96':
            case '97':
            case '98':
                if (USFile::isPurchase($p_s_file_code)) {
                    return USRegex::alphanumeric($p_s_document_correlative, 1, 20) && !USRegex::allZeros($p_s_document_correlative);
                } else {
                    return false;
                }
                break;
            default:
                return false;
        }
    }

    public static function isElectronic($p_s_sunat_code, $p_s_document_serie) {
        switch ($p_s_sunat_code) {
            case '01':
                return USRegex::in($p_s_document_serie, ['E001']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'F', 3, 3);
            case '02':
                return USRegex::in($p_s_document_serie, ['E001']);
            case '03':
                return USRegex::in($p_s_document_serie, ['EB01']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'B', 3, 3);
            case '04':
                return USRegex::in($p_s_document_serie, ['E001']);
            case '07':
            case '08':
                return USRegex::in($p_s_document_serie, ['E001', 'EB01']) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'F', 3, 3) || USRegex::preffixedAlphanumeric($p_s_document_serie, 'B', 3, 3);
            default:
                return false;
        }
    }

}
