<?php

/**
 * @param $data
 */

function homework3Task1($data)
{
    $xml = simplexml_load_file($data);
    echo "<pre>";
    print_r($xml);
    echo "<pre>";

}