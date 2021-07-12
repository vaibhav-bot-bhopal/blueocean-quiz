<?php

    // DB table to use
    $table = 'slots';

    // Table's primary key
    $primaryKey = 'id';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    $columns = array(
    array( 'db' => 'id', 'dt' => 0 ),
    array( 'db' => 'slot_name', 'dt' => 1 ),
    array( 'db' => 'slot_date', 'dt' => 2 ),
    array( 'db' => 'slot_state', 'dt' => 3 ),
    array( 'db' => 'free_slot', 'dt' => 4 )
    );

    // SQL server connection information
    $sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'blueolz8_blueocean',
    'host' => 'localhost'
    );


    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    * If you just want to use the basic configuration for DataTables with PHP
    * server-side, there is no need to edit below this line.
    */

    require( '../mptfs-admin/includes/ssp.class.php' );

    echo json_encode(
        SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
    );
?>