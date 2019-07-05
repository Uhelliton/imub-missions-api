<?php
if ( !function_exists('sql_injection') ) {
    /*
     * Método  anti Sql Injection e Ataques XSS
     * @param string $str
     */
    function sql_injection(string $str)
    {
        $field = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", '', $str);
        $field = strip_tags(htmlspecialchars(trim($field)));
        $field = addslashes(addslashes($field));
        return $field;
    }
}
