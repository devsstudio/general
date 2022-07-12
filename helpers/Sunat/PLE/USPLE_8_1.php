<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace US\Helpers\Sunat\PLE;

use App\Multitable;
use US\Helpers\USRegex;

/**
 * Description of PLE_8_1
 *
 * @author JEANPAPER
 */
class USPLE_8_1 {

    const CODE = '080100';
    //
    const STATE_0 = 0;
    const STATE_1 = 1;
    const STATE_6 = 6;
    const STATE_7 = 7;
    const STATE_9 = 9;

    public static function getFields() {

        return [
            ['field' => 1, 'required' => 1, 'description' => 'Periodo'],
            ['field' => 2, 'required' => 1, 'description' => '1. Contribuyentes del Régimen General: Número correlativo del mes o Código Único de la Operación (CUO), que es la llave única o clave única o clave primaria del software contable que identifica de manera unívoca el asiento contable en el Libro Diario o del Libro Diario de Formato Simplificado en que se registró la operación. 2. Contribuyentes del Régimen Especial de Renta - RER:  Número correlativo del mes. '],
            ['field' => 3, 'required' => 1, 'description' => 'Número correlativo del asiento contable identificado en el campo 2, cuando se utilice el Código Único de la Operación (CUO). El primer dígito debe ser: "A" para el asiento de apertura del ejercicio, "M" para los asientos de movimientos o ajustes del mes o "C" para el asiento de cierre del ejercicio.'],
            ['field' => 4, 'required' => 1, 'description' => 'Fecha de emisión del comprobante de pago o documento'],
            ['field' => 5, 'required' => 0, 'description' => 'Fecha de Vencimiento o Fecha de Pago (1)'],
            ['field' => 6, 'required' => 1, 'description' => 'Tipo de Comprobante de Pago o Documento'],
            ['field' => 7, 'required' => 0, 'description' => 'Serie del comprobante de pago o documento. En los casos de la Declaración Única de Aduanas (DUA) o de la Declaración Simplificada de Importación (DSI) se consignará el código de la dependencia Aduanera.'],
            ['field' => 8, 'required' => 0, 'description' => 'Año de emisión de la DUA o DSI'],
            ['field' => 9, 'required' => 1, 'description' => 'Número del comprobante de pago o documento o número de orden del formulario físico o virtual donde conste el pago del impuesto, tratándose de liquidaciones de compra, utilización de servicios prestados por no domiciliados u otros, número de la DUA, de la DSI, de la Liquidación de cobranza u otros documentos emitidos por SUNAT que acrediten el crédito fiscal en la importación de bienes. En caso de optar por anotar el importe total de las operaciones diarias que no otorguen derecho a crédito fiscal en forma consolidada, registrar el número inicial (2).'],
            ['field' => 10, 'required' => 0, 'description' => 'En caso de optar por anotar el importe total de las operaciones diarias que no otorguen derecho a crédito fiscal en forma consolidada, registrar el número final (2). '],
            ['field' => 11, 'required' => 0, 'description' => 'Tipo de Documento de Identidad del proveedor'],
            ['field' => 12, 'required' => 0, 'description' => 'Número de RUC del proveedor o número de documento de Identidad, según corresponda.'],
            ['field' => 13, 'required' => 0, 'description' => 'Apellidos y nombres, denominación o razón social  del proveedor. En caso de personas naturales se debe consignar los datos en el siguiente orden: apellido paterno, apellido materno y nombre completo.'],
            ['field' => 14, 'required' => 0, 'description' => 'Base imponible de las adquisiciones gravadas que dan derecho a crédito fiscal y/o saldo a favor por exportación, destinadas exclusivamente a operaciones gravadas y/o de exportación'],
            ['field' => 15, 'required' => 0, 'description' => 'Monto del Impuesto General a las Ventas y/o Impuesto de Promoción Municipal'],
            ['field' => 16, 'required' => 0, 'description' => 'Base imponible de las adquisiciones gravadas que dan derecho a crédito fiscal y/o saldo a favor por exportación, destinadas a operaciones gravadas y/o de exportación y a operaciones no gravadas'],
            ['field' => 17, 'required' => 0, 'description' => 'Monto del Impuesto General a las Ventas y/o Impuesto de Promoción Municipal'],
            ['field' => 18, 'required' => 0, 'description' => 'Base imponible de las adquisiciones gravadas que no dan derecho a crédito fiscal y/o saldo a favor por exportación, por no estar destinadas a operaciones gravadas y/o de exportación.'],
            ['field' => 19, 'required' => 0, 'description' => 'Monto del Impuesto General a las Ventas y/o Impuesto de Promoción Municipal'],
            ['field' => 20, 'required' => 0, 'description' => 'Valor de las adquisiciones no gravadas'],
            ['field' => 21, 'required' => 0, 'description' => 'Monto del Impuesto Selectivo al Consumo en los casos en que el sujeto pueda utilizarlo como deducción.'],
            ['field' => 22, 'required' => 0, 'description' => 'Otros conceptos, tributos y cargos que no formen parte de la base imponible.'],
            ['field' => 23, 'required' => 1, 'description' => 'Importe total de las adquisiciones registradas según comprobante de pago.'],
            ['field' => 24, 'required' => 0, 'description' => 'Código  de la Moneda (Tabla 4)'],
            ['field' => 25, 'required' => 0, 'description' => 'Tipo de cambio (3).'],
            ['field' => 26, 'required' => 0, 'description' => 'Fecha de emisión del comprobante de pago que se modifica (4).'],
            ['field' => 27, 'required' => 0, 'description' => 'Tipo de comprobante de pago que se modifica (4).'],
            ['field' => 28, 'required' => 0, 'description' => 'Número de serie del comprobante de pago que se modifica (4).'],
            ['field' => 29, 'required' => 0, 'description' => 'Código de la dependencia Aduanera de la Declaración Única de Aduanas (DUA) o de la Declaración Simplificada de Importación (DSI) .'],
            ['field' => 30, 'required' => 0, 'description' => 'Número del comprobante de pago que se modifica (4).'],
            ['field' => 31, 'required' => 0, 'description' => 'Fecha de emisión de la Constancia de Depósito de Detracción (6)'],
            ['field' => 32, 'required' => 0, 'description' => 'Número de la Constancia de Depósito de Detracción (6)'],
            ['field' => 33, 'required' => 0, 'description' => 'Marca del comprobante de pago sujeto a retención'],
            ['field' => 34, 'required' => 0, 'description' => 'Clasificación de los bienes y servicios adquiridos (Tabla 30)  Aplicable solo a los contribuyentes que hayan obtenido ingresos mayores a 1,500 UIT en el ejercicio anterior'],
            ['field' => 35, 'required' => 0, 'description' => 'Identificación del Contrato o del proyecto en el caso de los Operadores de las sociedades irregulares, consorcios, joint ventures u otras formas de contratos de colaboración empresarial, que no lleven contabilidad independiente.'],
            ['field' => 36, 'required' => 0, 'description' => 'Error tipo 1: inconsistencia en el tipo de cambio'],
            ['field' => 37, 'required' => 0, 'description' => 'Error tipo 2: inconsistencia por proveedores no habidos'],
            ['field' => 38, 'required' => 0, 'description' => 'Error tipo 3: inconsistencia por proveedores que renunciaron a la exoneración del Apéndice I del IGV'],
            ['field' => 39, 'required' => 0, 'description' => 'Error tipo 4: inconsistencia por DNIs que fueron utilizados en las Liquidaciones de Compra y que ya cuentan con RUC'],
            ['field' => 40, 'required' => 0, 'description' => 'Indicador de Comprobantes de pago cancelados con medios de pago'],
            ['field' => 41, 'required' => 1, 'description' => 'Estado que identifica la oportunidad de la anotación o indicación si ésta corresponde a un ajuste.'],
            ['field' => 42, 'required' => 0, 'description' => 'Campo de libre utilización.'],
            ['field' => 43, 'required' => 0, 'description' => ''],
            ['field' => 44, 'required' => 0, 'description' => ''],
            ['field' => 45, 'required' => 0, 'description' => ''],
            ['field' => 46, 'required' => 0, 'description' => ''],
            ['field' => 47, 'required' => 0, 'description' => ''],
            ['field' => 48, 'required' => 0, 'description' => ''],
            ['field' => 49, 'required' => 0, 'description' => ''],
            ['field' => 50, 'required' => 0, 'description' => ''],
            ['field' => 51, 'required' => 0, 'description' => ''],
            ['field' => 52, 'required' => 0, 'description' => ''],
            ['field' => 53, 'required' => 0, 'description' => ''],
            ['field' => 54, 'required' => 0, 'description' => ''],
            ['field' => 55, 'required' => 0, 'description' => ''],
            ['field' => 56, 'required' => 0, 'description' => ''],
            ['field' => 57, 'required' => 0, 'description' => ''],
            ['field' => 58, 'required' => 0, 'description' => ''],
            ['field' => 59, 'required' => 0, 'description' => ''],
            ['field' => 60, 'required' => 0, 'description' => ''],
            ['field' => 61, 'required' => 0, 'description' => ''],
            ['field' => 62, 'required' => 0, 'description' => ''],
            ['field' => 63, 'required' => 0, 'description' => ''],
            ['field' => 64, 'required' => 0, 'description' => ''],
            ['field' => 65, 'required' => 0, 'description' => ''],
            ['field' => 66, 'required' => 0, 'description' => ''],
            ['field' => 67, 'required' => 0, 'description' => ''],
            ['field' => 68, 'required' => 0, 'description' => ''],
            ['field' => 69, 'required' => 0, 'description' => ''],
            ['field' => 70, 'required' => 0, 'description' => ''],
            ['field' => 71, 'required' => 0, 'description' => ''],
            ['field' => 72, 'required' => 0, 'description' => ''],
            ['field' => 73, 'required' => 0, 'description' => ''],
            ['field' => 74, 'required' => 0, 'description' => ''],
            ['field' => 75, 'required' => 0, 'description' => ''],
            ['field' => 76, 'required' => 0, 'description' => ''],
            ['field' => 77, 'required' => 0, 'description' => ''],
            ['field' => 78, 'required' => 0, 'description' => ''],
            ['field' => 79, 'required' => 0, 'description' => ''],
            ['field' => 80, 'required' => 0, 'description' => ''],
            ['field' => 81, 'required' => 0, 'description' => ''],
            ['field' => 82, 'required' => 0, 'description' => ''],
        ];
    }

}
