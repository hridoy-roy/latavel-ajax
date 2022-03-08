<?php

function tax($amount, $tax)
{
    $result = ($amount * $tax )/100;
    return $result;
}
