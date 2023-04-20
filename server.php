<?php
    $list = [
        'spesa',
        'bollette',
        'assicurazione',
        'affitto'
    ];

    header('Content-Type: application/json');
    echo json_encode($list);