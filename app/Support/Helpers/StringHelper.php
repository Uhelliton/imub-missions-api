<?php
/*
 * Método que remove todos os caracteres deixando apenas number
 * @param string $str
 */
function number_only(string $str)
{
    return preg_replace('/[^0-9]+/','', $str);
}

/*
 * Método que remove todos os caracteres deixando apenas string
 * @param string $str
 */
function str_only(string $str)
{
    return preg_replace('/[^A-Za-z![:space:]]/','', $str);
}

/*
 * Método que retorna a primeira parte de uma string apos o espaço
 * @param string $str
 */
function str_first(string $str = null)
{
    $string =  preg_replace('/\s\s+/', '', $str); //remove 2 ou mais espacos em branco de uma string
    $findOcorrenceFirstString  = strpos($string, ' ');
    $firstPartString = substr($str, 0, $findOcorrenceFirstString);
    return $firstPartString;
}