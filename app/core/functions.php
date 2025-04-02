<?php

function toBase64($libri){
    foreach ($libri as $libro) {
        $libro->Copertina = base64_encode($libro->Copertina);
    }
    return $libri;
}