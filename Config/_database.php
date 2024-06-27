<?php
function connectDB() {
    $dbName= DB_NAME;
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $dbExists = FALSE;
    $result = $conn->query("SHOW DATABASES");
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc() ) {
            if($row['Database'] == DB_NAME){
                $dbExists = TRUE;
                break;
            }
        }
    }  
    if(!$dbExists){
        checkAndCreateDatabase($conn);
    }else {
        $conn->select_db(DB_NAME);
    }
    return $conn;
}

function checkAndCreateDatabase($conn) {
        $create_db_query = "CREATE DATABASE " . DB_NAME;
        if ($conn->query($create_db_query) === TRUE) {
            echo "Database created successfully.\n";
            $conn->select_db(DB_NAME);
            createTables($conn);
        } else {
            die("Error creating database: " . $conn->error);
        }
}

function createTables($conn) {
    $create_users_response = "CREATE TABLE IF NOT EXISTS `response` (`id` INT PRIMARY KEY AUTO_INCREMENT, `postcode` VARCHAR(255), `yes_no` VARCHAR(3), `email` VARCHAR(255), `mobile_number` INT(15), `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP)";

    if ($conn->query($create_users_response) !== TRUE) {
        die("Error creating users table: " . $conn->error);
    }

}
?>
