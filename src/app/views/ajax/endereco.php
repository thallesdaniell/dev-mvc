<?php

// header ('Content-type: text/html; charset=iso-8859-1'); // charset=utf-8 ou charset=iso-8859-1
$q            = strtolower($_GET["q"]);
if (!$q)
    return;
$autocomplete = new Autocomplete($q);
$autocomplete->listarEnderecos();


