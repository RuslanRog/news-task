<?php

/*
 *  It is an independent script for creating Database and Table for News task.
 *  In terminal run "php createDBscript.php".
 */

// Database connection details
$host = "localhost";
$username = "root";
$password = "";

// Connect to MySQL server
$conn = mysqli_connect($host, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS news_api_task";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully\n";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "\n";
}

// Select database
mysqli_select_db($conn, "news_api_task");



// Create table categories.
$sqlCreateCategories = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name_en VARCHAR(20) NOT NULL,
    category_name_ua VARCHAR(20) NOT NULL
    )";

if (mysqli_query($conn, $sqlCreateCategories)) {
    echo "The table categories has been created successfully\n";
} else {
    echo "Error creating table categories: " . mysqli_error($conn) . "\n";
}


// Category data
$categoryData = array(
    array('Basketball', 'Баскетбол'),
    array('Football', 'Футбол'),
    array('Baseball', 'Бейсбол'),
);

// Insert to categories.
foreach ($categoryData as $row) {
    $en_name = mysqli_real_escape_string($conn, $row[0]);
    $ua_name = mysqli_real_escape_string($conn, $row[1]);
    $sqlInsertIntoCategories = "INSERT INTO `categories` (`category_name_en`, `category_name_ua`) VALUES ('$en_name', '$ua_name')";
    // mysqli_query($conn, $sqlInsertIntoCategories);
    if (mysqli_query($conn, $sqlInsertIntoCategories)) {
        echo "$row[0] was added to Categories successfully\n";
    } else {
        echo "Error to add $row[0] to Categories: " . mysqli_error($conn) . "\n";
    }
}


// Create table news.
$sqlCreateNews = "CREATE TABLE IF NOT EXISTS news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categories_id INT NOT NULL,
    title_en VARCHAR(255) NOT NULL,
    description_en TEXT NOT NULL,
    title_ua VARCHAR(255) NOT NULL,
    description_ua TEXT NOT NULL,
    created_at TIMESTAMP,
    INDEX SHORT_DESC_IND(SHORT_DESC, PUBLISHER),
    FOREIGN KEY (categories_id) REFERENCES categories(id)
    )";

if (mysqli_query($conn, $sqlCreateNews)) {
    echo "The table news has been created successfully\n";
} else {
    echo "Error creating table news: " . mysqli_error($conn) . "\n";
}





// Close connection
mysqli_close($conn);
?>