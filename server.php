<?php                        //server
    $list = [               //array 
        'spesa',
        'bollette',
        'assicurazione',
        'affitto',
    ];
    if (isset($_POST['task'])){
        $list[] .= $_POST['task'];
    }

    header('Content-Type: application/json');  // converto i dati che voglio spedire
    echo json_encode($list);                   // in una stringa di testo contenuta 
                                               // all'intero di un file .json