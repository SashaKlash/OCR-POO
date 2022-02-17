<?php
function classesAutoLoad($classe)
{
    require $classe . '.class.php';
}

spl_autoload_register('classesAutoLoad');
