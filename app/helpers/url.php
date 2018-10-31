<?php 

function permalink($str, $options = array())
{
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
    $defaults = array(
        'delimiter' => '-',
        'limit' => null,
        'lowercase' => true,
        'replacements' => array(),
        'transliterate' => true
    );
    $options = array_merge($defaults, $options);
    $char_map = array(
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g'
    );
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
    $str = trim($str, $options['delimiter']);
    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}


function filterSTR($str)
{
    return htmlspecialchars(strip_tags(trim($str)));
}

function get($key)
{
    if(isset($_GET[$key]))
    {
        if(is_array($_GET[$key])){
            return array_map(function($item){
                return filterSTR($item);
            }, $_GET[$key]);
        }
        
        return filterSTR($_GET[$key]);
    }
    else
        return false;
}

function post($key)
{
    if(isset($_POST[$key])){
       if(is_array($_POST[$key])){
            return array_map(function($item){
                return filterSTR($item);
            }, $_POST[$key]);
        }
        return filterSTR($_POST[$key]);
    }
    return false;
}

function pre($array)
{
    echo '<pre>';
        print_r($array);
    echo '</pre>';
}

function url($index){
    global $_url;

    if(isset($_url[$index]))
        return $url[$index];
    return false;
}


function site_url($url = null)
{
    return BASE_URL . $url;
}

function assets_url($url = null)
{
    return BASE_URL . "assets/" . $url;
}

