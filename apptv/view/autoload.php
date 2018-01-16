<?php
/**
 * Created by PhpStorm.
 * User: Rodolfo
 * Date: 16/01/2018
 * Time: 00:59
 */

namespace apptv;

function load($namespace) {
    $divDir = explode('\\', $namespace);
    $dir = '';
    $name = '';
    $primeiroDir = true;
    for ($i = 0; $i < count($divDir); $i++) {
        if ($divDir[$i] && !$primeiroDir) {
            if ($i == count($divDir) - 1)
                $name = $divDir[$i];
            else
                $dir .= DIRECTORY_SEPARATOR . $divDir[$i];
        }
        if ($divDir[$i] && $primeiroDir) {
            if ($divDir[$i] != __NAMESPACE__)
                break;
            $primeiroDir = false;
        }
    }
    if (!$primeiroDir) {
        $diretorioCompleto = '../' . $dir . DIRECTORY_SEPARATOR . $name . '.php';
        return require_once(strtolower($diretorioCompleto));
    }
    return false;
}
function loadPath($diretorioCompleto) {
    return require_once(strtolower($diretorioCompleto));
}
spl_autoload_register(__NAMESPACE__ . '\load');