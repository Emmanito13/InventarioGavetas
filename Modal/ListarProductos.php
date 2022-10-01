<?php
// abrimos la sesión cURL
$ch = curl_init();
        
// definimos la URL a la que hacemos la petición
curl_setopt($ch, CURLOPT_URL,"http://169.254.16.253/apiferrum/cortes/pcorte.php");
// indicamos el tipo de petición: POST
curl_setopt($ch, CURLOPT_POST, TRUE);
// definimos cada uno de los parámetros
curl_setopt($ch, CURLOPT_POSTFIELDS, "opcion=1");

// recibimos la respuesta y la guardamos en una variable
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$remote_server_output = curl_exec ($ch);

// cerramos la sesión cURL
curl_close ($ch);

// hacemos lo que queramos con los datos recibidos
// por ejemplo, los mostramos
//print_r($remote_server_output);

$array = json_decode($remote_server_output, true);
print_r($array);
/*
if(!empty($array)){
    for($i=0; $i<count($array); $i++){
        $list[] = array(
            "op" => '<div class="btn-group> 
                <button class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" 
                    aria-haspopup="true" aria-expanded="true"><i class="fas fa-user-cog"></i>
                </button>
            </dive>',
            "FECHA"=>$array[$i]['FECHA'],
            "SERNOMBRE"=>$array[$i]['SERNOMBRE'],
            "IMPORTECAJA"=>$array[$i]['IMPORTECAJA']
        );
    }
    $result = array(
        "sEcho" => 1,
        "iTotalRecords" => count($list),
        "iTotalDisplayRecords" => count($list),
        "aaData" => $list
    );
    echo json_encode($result);
} else { echo json_encode($array); }*/

?>