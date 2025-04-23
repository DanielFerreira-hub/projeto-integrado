# Middleware in Laravel

This folder contains guides and files for implementing middleware and authentication.

---

## Purpose

Middleware filters HTTP requests and can be used for authentication, logging, etc.

---

## Commands

1. Create a new middleware:
   ```bash
   php artisan make:middleware MiddlewareName
   ```

2. Register middleware in `app/Http/Kernel.php`:
   ```php
   protected $routeMiddleware = [
       'auth' => \App\Http\Middleware\Authenticate::class,
   ];
   ```

3. Use middleware in a route:
   ```php
   Route::get('/dashboard', function () {
       return view('dashboard');
   })->middleware('auth');
   ```

---

## Notes

- Use Laravel Sanctum for API authentication.
- Refer to `Kernel.php` for middleware registration.
