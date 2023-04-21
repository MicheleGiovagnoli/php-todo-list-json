<?php 
//Importo i file dal mio data
    //Verifico se il file esiste
    if(file_exists('data.json')){
        //Importo e Decodifico l'array
        $string = file_get_contents('data.json');
        $list = json_decode($string, true);
    }
    else{
        $list = [];
    }

//Importo i file nel mio data
    //Aggiungo una nuova voce all'array decodificato
    if (isset($_POST['task'])){
        $list[] = [
            'name' => $_POST['task'],
            'done' => false
        ];

        $stringList = json_encode($list);
        file_put_contents('data.json', $stringList);
    }

    header('Content-Type: application/json');  // converto i dati che voglio spedire
    echo json_encode($list);                   // in una stringa di testo contenuta 
                                               // all'intero di un file .json