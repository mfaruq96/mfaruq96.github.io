<?php

if( isset($_POST['submit']) )
{
 
    $status = $_POST['status'];

    // timestamp
    date_default_timezone_set('Asia/Jakarta'); // set timezone
    $created_at = date('d F Y h:i:s');

    // data json
    $array_data = file_get_contents('./assets/database/yes.json');
    $new_data_array = json_decode($array_data, true);

    // data new
    $new_data = [
        'created_at' => $created_at,
        'status' => $status,
    ];

    // add to array
    $new_data_array[] = $new_data;

    // 
    $update_data_array = json_encode($new_data_array);

    if( file_put_contents('./assets/database/yes.json', $update_data_array) )
    {
        // redirect
        header("location: http://wa.me/628971793630?text=Assalamualaikum Mas Faruq, saya bersedia, kapan Mas Faruq ingin main ke tempat saya ?");
        // header("location: home.html");
    }

    // echo "<pre>";
    // print_r($new_data_array);
    // echo "</pre>";

}

if( isset($_POST['failed']) )
{
 
    $status = $_POST['status'];

    // timestamp
    date_default_timezone_set('Asia/Jakarta'); // set timezone
    $created_at = date('d F Y h:i:s');

    // data json
    $array_data = file_get_contents('./assets/database/no.json');
    $new_data_array = json_decode($array_data, true);

    // data new
    $new_data = [
        'created_at' => $created_at,
        'status' => $status,
    ];

    // add to array
    $new_data_array[] = $new_data;

    // 
    $update_data_array = json_encode($new_data_array);

    if( file_put_contents('./assets/database/no.json', $update_data_array) )
    {
        // redirect
        header("location: http://wa.me/628971793630?text=Assalamualaikum Mas Faruq, maaf saya belum bersedia.");
        // header("location: home.html");
    }

    // echo "<pre>";
    // print_r($new_data_array);
    // echo "</pre>";

}

?>