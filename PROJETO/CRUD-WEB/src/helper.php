<?php

function dd($arg)
{
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
    die;
}