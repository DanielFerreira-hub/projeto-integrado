# Authentication & Authorization

This folder contains step-by-step instructions for implementing **Authentication** (using Laravel Sanctum) and **Authorization** (Role-Based Access Control) in your Laravel project.

---

## 1. Install and Configure Laravel Sanctum
1. Install Sanctum via Composer:
   ```bash
   composer require laravel/sanctum
   ```

2. Publish Sanctum's configuration file:
   ```bash
   php artisan vendor:publish --provider="Laravel\\Sanctum\\SanctumServiceProvider"
   ```

3. Run database migrations to create the necessary tables for Sanctum:
   ```bash
   php artisan migrate
   ```

4. Add Sanctum Middleware:
   Open `app/Http/Kernel.php` and add Sanctum's middleware to the `api` group:
   ```php
   protected $middlewareGroups = [
       'api' => [
           \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
           'throttle:api',
           \Illuminate\Routing\Middleware\SubstituteBindings::class,
       ],
   ];
   ```

5. Add the `HasApiTokens` trait to the `User` model:
   Open `app/Models/User.php` and update it as follows:
   ```php
   <?php

   namespace App\Models;

   use Laravel\Sanctum\HasApiTokens;
   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Foundation\Auth\User as Authenticatable;

   class User extends Authenticatable
   {
       use HasApiTokens, HasFactory;

       protected $fillable = [
           'name',
           'email',
           'password',
           'role_id',
       ];

       protected $hidden = [
           'password',
       ];
   }
   ```

---

## 2. Create Authentication Endpoints

### 2.1 Login Endpoint
1. Create an `AuthController`:
   ```bash
   php artisan make:controller AuthController
   ```

2. Add the `login` method to handle user authentication:
   ```php
   public function login(Request $request)
   {
       $request->validate([
           'email' => 'required|email',
           'password' => 'required',
       ]);

       $user = User::where('email', $request->email)->first();

       if (!$user || !Hash::check($request->password, $user->password)) {
           return response()->json(['error' => 'Invalid credentials'], 401);
       }

       $token = $user->createToken('auth_token')->plainTextToken;

       return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
       ]);
   }
   ```

3. Add the route for login in `routes/api.php`:
   ```php
   Route::post('/login', [AuthController::class, 'login']);
   ```

---

### 2.2 Logout Endpoint
1. Add the `logout` method to `AuthController`:
   ```php
   public function logout(Request $request)
   {
       $request->user()->tokens()->delete();

       return response()->json(['message' => 'Logged out successfully']);
   }
   ```

2. Add the route for logout in `routes/api.php`:
   ```php
   Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
   ```

---

## 3. Role-Based Access Control (RBAC)

### 3.1 Create Middleware for Role Checks
1. Create a middleware for role-based access:
   ```bash
   php artisan make:middleware CheckRole
   ```

2. Add the role-check logic to `CheckRole` middleware:
   ```php
   <?php

   namespace App\Http\Middleware;

   use Closure;
   use Illuminate\Http\Request;

   class CheckRole
   {
       public function handle(Request $request, Closure $next, $role)
       {
           if ($request->user()->role_id != $role) {
               return response()->json(['error' => 'Unauthorized'], 403);
           }

           return $next($request);
       }
   }
   ```

3. Register the middleware in `app/Http/Kernel.php`:
   ```php
   protected $routeMiddleware = [
       'role' => \App\Http\Middleware\CheckRole::class,
   ];
   ```

---

### 3.2 Protect Routes with Middleware
1. Use the `auth:sanctum` and `role` middleware to protect routes:
   ```php
   Route::middleware(['auth:sanctum', 'role:1'])->get('/admin', function () {
       return response()->json(['message' => 'Welcome, Admin!']);
   });

   Route::middleware(['auth:sanctum', 'role:2'])->get('/editor', function () {
       return response()->json(['message' => 'Welcome, Editor!']);
   });
   ```

---

## 4. Testing
1. Use Postman or a similar tool to test the `/login` endpoint.
2. Use the returned token to test protected routes (e.g., `/admin` or `/editor`).
3. Test `/logout` to ensure tokens are invalidated.

---
