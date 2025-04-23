# API Development in Laravel

This folder contains guides and files for building RESTful APIs with Laravel.

---

## Purpose

Develop APIs for client applications to interact with the back-end.

---

## Commands

1. Define API routes in `routes/api.php`:
   ```php
   Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
       return $request->user();
   });
   ```

2. Test the API using tools like Postman or curl:
   ```bash
   curl -X GET http://127.0.0.1:8000/api/users
   ```

---

## Notes

- Use Laravel Sanctum for API authentication.
- Follow RESTful principles for API design.
