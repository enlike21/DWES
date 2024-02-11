<?php
	
/**
 * FUNCIONES DE VALIDACIÓN
 */

	/*
    * Función que devuelve el valor del campo recibido como párametro
    * @param {string} $campo - Nombre del campo a comprobar en el REQUEST
    * @param {string} $valor - Valor del campo recibido como parámetro
    */
    function obtenerValorCampo(string $campo): string{
        // Comprobamos si nos llega el nombre del campo en el REQUEST
        if (!isset($_REQUEST[$campo])) 
        {
          $valor = "";
        } 
        else 
        {
          // Limpiamos el campo de etiquetas y espacios
          $valor = trim(strip_tags($_REQUEST[$campo]));
        }
        return $valor;
    }


/**
 * FIN FUNCIONES DE VALIDACIÓN
 */


/**
 * FUNCIONES TRABAJAR CON BBDD
 */
	




/**
 * FIN FUNCIONES TRABAJAR CON BBDD
 */

	
?>