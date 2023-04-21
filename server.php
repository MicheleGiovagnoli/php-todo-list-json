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
    //Elimino con array_splice la task nella posizione che ho passato 
    if (isset($_POST['positionTask'])){
        array_splice($list, $_POST['positionTask'], 1);
        $stringList = json_encode($list);
        file_put_contents('data.json', $stringList);
    }
    //cambio il valore 
    if (isset($_POST['select'])){
        $list[$_POST['select']]['stat'] = !$list[$_POST['select']]['stat'];

        $stringList = json_encode($list);
        file_put_contents('data.json', $stringList);
    }

    header('Content-Type: application/json');  // converto i dati che voglio spedire
    echo json_encode($list);                   // in una stringa di testo contenuta 
                                               // all'intero di un file .json