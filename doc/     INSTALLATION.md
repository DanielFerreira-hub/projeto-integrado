## Project: ISLA IT Asset Management

### Description
This project is a web-based system for managing the IT assets of ISLA-IPGT. It allows users to track hardware, software, and educational equipment efficiently.

### Technologies Used
- **Frontend:** React.js
- **Backend:** Laravel
- **Database:** MariaDB/MySQL
- **Tools:** Insomnia (API testing), Beekeeper/DBeaver (Database management)

### Repository Structure
- `/docs` - Documentation files
- `/frontend` - React.js application
- `/backend` - Laravel API

---

# INSTALLATION.md

## Installation Guide

### Prerequisites
Ensure you have the following installed:
- Node.js & npm
- PHP & Composer
- MariaDB/MySQL
- Git

### Backend Setup
1. Clone the repository:  
   ```bash
   git clone <repository-url>
   cd backend
   ```
2. Install dependencies:  
   ```bash
   composer install
   ```
3. Set up environment variables:  
   ```bash
   cp .env.example .env
   ```
   - Configure database credentials in `.env`.
4. Run migrations and seed the database:  
   ```bash
   php artisan migrate --seed
   ```
5. Start the Laravel development server:  
   ```bash
   php artisan serve
   ```

### Frontend Setup
1. Navigate to the frontend directory:  
   ```bash
   cd ../frontend
   ```
2. Install dependencies:  
   ```bash
   npm install
   ```
3. Start the React development server:  
   ```bash
   npm run dev
   ```

Your application should now be running!
