# Database Integration in Laravel

This folder contains guides and files for integrating Laravel with MariaDB.

---

## Purpose

Set up and interact with the MariaDB database.

---

## Commands

1. Run migrations to create tables:
   ```bash
   php artisan migrate
   ```

2. Rollback the last migration:
   ```bash
   php artisan migrate:rollback
   ```

3. Seed the database with fake data:
   ```bash
   php artisan db:seed
   ```

---

## Notes

- Configure database credentials in the `.env` file.
- Use factories and seeders for testing data.
