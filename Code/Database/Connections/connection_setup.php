<?php

use Illuminate\Support\Facades\DB;

// Test database connection
function testDatabaseConnection() {
    try {
        DB::connection()->getPdo();
        echo "Database connection is successful.";
    } catch (\Exception $e) {
        echo "Could not connect to the database. Please check your configuration. Error: " . $e->getMessage();
    }
}

// Call the function to test the connection
testDatabaseConnection();
