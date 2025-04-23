# Laravel Setup

This folder contains instructions to initialize and configure the Laravel project.

---

## Steps

1. Install Laravel:
   ```bash
   composer create-project laravel/laravel backend
   ```
2. Configure the `.env` file with:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE=parque_informatico
   DB_USERNAME=admin
   DB_PASSWORD=1234
   ```
3. Run migrations:
   ```bash
   php artisan migrate
   ```
4. Start the server:
   ```bash
   php artisan serve
   ```

---

## Notes

- Ensure MariaDB is running locally before starting the Laravel server.
- Use `php artisan` commands for specific tasks.
