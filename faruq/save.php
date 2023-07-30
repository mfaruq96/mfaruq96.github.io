<?php

if( isset($_POST['submit']) )
{
 
    $status = $_POST['status'];

    // timestamp
    date_default_timezone_set('Asia/Jakarta'); // set timezone
    $created_at = date('d F Y h:i:s');

    // data json
    $array_data = file_get_contents('./assets/database/data.json');
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

    if( file_put_contents('./assets/database/data.json', $update_data_array) )
    {
        // redirect
        // header("location: http://wa.me/628971793630?text=Assalamualaikum");
        header("location: home.html");
    }

    // echo "<pre>";
    // print_r($new_data_array);
    // echo "</pre>";

}

?>