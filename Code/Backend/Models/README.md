# Models in Laravel

This folder contains guides and files for implementing Eloquent models.

---

## Purpose

Models are used to interact with the database tables.

---

## Commands

1. Create a new model:
   ```bash
   php artisan make:model ModelName
   ```

2. Example model:
   ```php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class User extends Model
   {
       protected $fillable = ['name', 'email', 'password'];
   }
   ```

---

## Notes

- Place all models in the `app/Models` directory.
- Use migrations to define table structures.
