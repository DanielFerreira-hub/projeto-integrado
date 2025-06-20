# Project: ISLA IT Asset Management

## Description
This project is a web-based system for managing the IT assets of ISLA-IPGT. It enables efficient tracking of hardware, software, and educational equipment to streamline inventory management and maintenance.

---

## Features
- **Asset Tracking:** Manage and monitor IT assets, including hardware, software, and didactic equipment.
- **User Management:** Assign roles and permissions for different user levels (Admin, Technician).
- **Maintenance Logging:** Track and attach maintenance actions to any asset type.
- **Image/Document Attachment:** Upload photos or documents for any asset.
- **Reports & Insights:** Generate reports on asset status and utilization.
- **Search & Filtering:** Easily find and filter assets based on various criteria.

---

## Technologies Used
- **Frontend:** [React.js](https://react.dev/)
- **Backend:** [Laravel](https://laravel.com/) (JWT Authentication)
- **Database:** MariaDB/MySQL
- **Tools:** Insomnia (API testing), Beekeeper/DBeaver (Database management), GitHub (version control)

---

## Repository Structure

```
/ (repo root)
├── README.md
├── docs/
│   └── database_schema.md
├── frontend/
├── backend/
└── .env.example
```

- `/docs` — Project documentation (includes database schema)
- `/frontend` — React.js application
- `/backend` — Laravel API
- `.env.example` — Example environment configuration
- `README.md` — Project overview and setup guide

---

## 🚦 Step-by-Step Setup & Development Guide

### 1. **Project Preparation**
- Clone this repository:  
  `git clone https://github.com/DanielFerreira-hub/projeto-integrado.git`
- Make sure [Node.js](https://nodejs.org/), [Composer](https://getcomposer.org/), and [MariaDB/MySQL](https://mariadb.org/) are installed on your system.

---

### 2. **Database Setup**
- Open Beekeeper/DBeaver and create a database called `isla_asset_management` (or your preferred name).
- Note your DB username and password for use in the backend configuration.
- See `/docs/database_schema.md` for the full schema and ER diagram guidelines.

---

### 3. **Backend (Laravel) Setup**
- Go to the `backend` folder:  
  `cd backend`
- Install dependencies:  
  `composer install`
- Copy `.env.example` to `.env`:  
  `cp .env.example .env`
- Update `.env` with your DB credentials.
- Generate application key:  
  `php artisan key:generate`
- Install JWT Auth package:  
  `composer require tymon/jwt-auth`
- Publish JWT config:  
  `php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"`
- Generate JWT secret:  
  `php artisan jwt:secret`
- Run migrations to set up your tables:  
  `php artisan migrate`
- (Optional) Seed the database with an initial admin user:  
  `php artisan db:seed`

---

### 4. **Backend Development Workflow**
- Write or update migrations for: users, assets, locations, statuses, maintenance, etc., based on your schema.
- Implement Models, Controllers, and Routes for:
    - Users (with roles)
    - Hardware, Software, Didactic Equipment
    - Locations
    - Statuses
    - Maintenance logs (polymorphic relation)
    - Asset images/documents (polymorphic relation)
- Use Eloquent's [polymorphic relationships](https://laravel.com/docs/eloquent-relationships#polymorphic-relationships) for images and maintenance logs.
- Protect routes using JWT authentication and role middleware.
- Test all endpoints using Insomnia.
- Document your API endpoints in `/docs/api.md`.

---

### 5. **Frontend (React) Setup** *(after backend is working)*
- Go to the `frontend` folder:  
  `cd ../frontend`
- Install dependencies:  
  `npm install`
- Set up `.env` for API URL if needed.
- Start the development server:  
  `npm start`

---

### 6. **Frontend Development Workflow**
- Build authentication pages (login, session management with JWT).
- Build pages for CRUD operations:  
    - Users (admin only)
    - Hardware, Software, Didactic Equipment
    - Locations
    - Statuses
    - Maintenance logs
    - Asset images/documents
- Implement role-based access (hide/show navigation based on user role).
- Polish UI with your chosen UI library (Material UI, Bootstrap, etc.).
- Ensure all user flows are tested and functional.

---

### 7. **Documentation**
- Keep `/docs/api.md` updated with all available endpoints and usage.
- Add a database schema diagram (ERD) to `/docs/` (see `/docs/database_schema.md` for guidance).
- Update this README.md if setup steps change.

---

### 8. **Final Steps**
- Thoroughly test the application (both backend and frontend).
- Clean up any test data and code comments.
- Ensure all documentation is clear and updated.
- Commit and push all final changes to GitHub.

---

## User Roles

| Role      | Permissions                                                               |
|-----------|--------------------------------------------------------------------------|
| Admin     | Full access: manage users, assets, locations, statuses, maintenance, view reports   |
| Technician| Manage/view assets, locations, statuses, maintenance. Cannot manage users           |

---

## Database Schema & ER Diagrams

- The full schema and sample data are in [`/docs/database_schema.md`](docs/database_schema.md).
- **ER Diagram Guidance:**  
  - Draw all tables and their columns.
  - Use solid lines for direct foreign keys.
  - Use dashed or colored lines for polymorphic links from `asset_images` and `maintenance_logs` to each asset table, labeled "polymorphic reference".
  - Add a legend or note explaining the polymorphic relationship.

---

## Maintainer

This project is built and maintained by [DanielFerreira-hub](https://github.com/DanielFerreira-hub).

For questions or help, contact df.danielferreira07@gmail.com.

---

## .gitignore Example

You should add a `.gitignore` file to avoid committing sensitive or unnecessary files. Here’s a basic example (add this as `.gitignore` in your repo root):

```
# Laravel
/backend/vendor/
/backend/.env

# Node/React
/frontend/node_modules/
/frontend/.env

# OS/system
.DS_Store
Thumbs.db
```

## Contact

For questions or help, contact [df.danielferreira07@gmail.com].

---
