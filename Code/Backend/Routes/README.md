# Routes in Laravel

This folder contains details about defining routes in Laravel.

---

## Purpose

Routes map URLs to specific controllers or actions.

---

## Commands

1. Define a web route in `routes/web.php`:
   ```php
   Route::get('/', function () {
       return view('welcome');
   });
   ```

2. Define an API route in `routes/api.php`:
   ```php
   Route::get('/users', [UserController::class, 'index']);
   ```

---

## Notes

- Use `routes/web.php` for web-specific routes.
- Use `routes/api.php` for API endpoints.
