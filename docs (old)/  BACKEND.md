# Back-end Development Guide

## Objective
This guide explains how the Laravel back-end for the project is structured, implemented, and integrated with MariaDB/MySQL.

---

## Folder Structure
The following describes the key folders in a typical Laravel project:
- `app/Http/Controllers`: Contains all the controllers that handle incoming requests and return responses.
- `app/Models`: Contains the Eloquent models that represent and interact with the database.
- `routes`: Contains the route definitions for the application.
  - `routes/web.php`: Defines web routes for the application.
  - `routes/api.php`: Defines API routes for the application.
- `database/migrations`: Contains migration files for creating and modifying database tables.

---

## Routes
Routes in Laravel are defined in the `routes` folder. Here's how to define routes:
- **Web Routes** (`routes/web.php`):
  ```php
  Route::get('/', function () {
      return view('welcome');
  });
  ```
- **API Routes** (`routes/api.php`):
  ```php
  Route::get('/users', [UserController::class, 'index']);
  ```

---

## Controllers
Controllers handle the logic for requests and responses. To create a controller:
1. Use the Artisan command:
   ```bash
   php artisan make:controller UserController
   ```
2. Example of a controller method:
   ```php
   namespace App\Http\Controllers;

   use Illuminate\Http\Request;

   class UserController extends Controller
   {
       public function index()
       {
           // Logic to fetch and return users
           return response()->json(['users' => []]);
       }
   }
   ```

---

## Models
Models represent database tables and are used for interacting with the database. To create a model:
1. Use the Artisan command:
   ```bash
   php artisan make:model User
   ```
2. Example of a model:
   ```php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;

   class User extends Model
   {
       use HasFactory;

       protected $fillable = ['name', 'email', 'password'];
   }
   ```

---

## Middleware and Authentication
Middleware is used to filter HTTP requests. To create middleware:
1. Use the Artisan command:
   ```bash
   php artisan make:middleware CheckUser
   ```
2. Register the middleware in `app/Http/Kernel.php`.

### Authentication
Laravel provides built-in support for authentication using Sanctum:
1. Install Sanctum:
   ```bash
   composer require laravel/sanctum
   ```
2. Publish the Sanctum configuration:
   ```bash
   php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
   ```
3. Add Sanctum's middleware to `api` routes in `app/Http/Kernel.php`:
   ```php
   'api' => [
       \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
       'throttle:api',
       \Illuminate\Routing\Middleware\SubstituteBindings::class,
   ],
   ```
4. Protect routes:
   ```php
   Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
       return $request->user();
   });
   ```

---

## Database Integration
The back-end uses MariaDB/MySQL as the database. Follow these steps to integrate:
1. Configure the `.env` file with database credentials:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3307
   DB_DATABASE=parque_informatico
   DB_USERNAME=admin
   DB_PASSWORD=1234
   ```
2. Run migrations to set up database tables:
   ```bash
   php artisan migrate
   ```
3. Use Eloquent models to interact with the database:
   ```php
   $users = User::all();
   ```

---

## Notes
- Follow the Laravel documentation for advanced features.
- Use `php artisan` commands to simplify development tasks.
- Ensure proper error handling and validation in all controllers.
