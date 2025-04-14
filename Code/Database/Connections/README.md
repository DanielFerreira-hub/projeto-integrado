# Database Connections

This folder contains scripts and utilities to manage and verify database connections in the Laravel project.

## Files
- `connection_setup.php`: A script to test the database connection.

## Usage
1. Ensure your `.env` file contains the correct database credentials.
2. Run the `connection_setup.php` script to verify the database connection:
   ```bash
   php database/connections/connection_setup.php
   ```

## Notes
- This script is for development and debugging purposes only. Do not use it in production.
