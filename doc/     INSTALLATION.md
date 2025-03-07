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
   git clone https://github.com/DanielFerreira-hub/projeto-integrado.git
   cd projeto-integrado/backend
   ```
2. Install dependencies:  
   ```bash
   composer install
   ```
3. Set up environment variables:  
   ```bash
   cp .env.example .env
   ```
   - Configure database credentials in `.env`:
     ```dotenv
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```
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
   npm start
   ```

Your application should now be running!

- **Backend:** Open your browser and go to `http://localhost:8000`
- **Frontend:** Open your browser and go to `http://localhost:3000`
