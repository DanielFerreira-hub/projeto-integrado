# Database Structure

## Objective
Define tables, relationships, and database schema for managing the assets of the ISLA-IPGT Informatics Park (hardware, software, and educational equipment), accessible via a browser in the back office.

## Tables and Columns

### `users` Table
- **ID:** Unique identifier
- **Name:** User name
- **Email:** User email (unique)
- **Password:** User password
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `roles` Table
- **ID:** Unique identifier
- **Name:** Role name (e.g., Admin, User)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `user_roles` Table
- **User_id:** Identifier of the user (foreign key to `users`)
- **Role_id:** Identifier of the role (foreign key to `roles`)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `assets` Table
- **ID:** Unique identifier
- **Name:** Asset name
- **Category_id:** Identifier of the asset category (foreign key to `categories`)
- **Description:** Asset description
- **Status:** Asset status (e.g., available, in use, under maintenance)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `categories` Table
- **ID:** Unique identifier
- **Name:** Category name
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `assignments` Table
- **ID:** Unique identifier
- **User_id:** Identifier of the user (foreign key to `users`)
- **Asset_id:** Identifier of the asset (foreign key to `assets`)
- **Assigned_at:** Assignment date
- **Returned_at:** Return date (nullable)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `maintenance_logs` Table
- **ID:** Unique identifier
- **Asset_id:** Identifier of the asset (foreign key to `assets`)
- **Description:** Description of the maintenance performed
- **Performed_at:** Date when the maintenance was performed
- **Created_at:** Record creation date
- **Updated_at:** Record update date

## Relationships
- **1:N:** One-to-many relationship between `categories` and `assets` (one category has many assets).
- **1:N:** One-to-many relationship between `users` and `assignments` (one user can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `assignments` (one asset can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `maintenance_logs` (one asset can have many maintenance logs).
- **N:M:** Many-to-many relationship between `users` and `roles` (through `user_roles`).

## Database Diagram
(Include ER diagram here or provide a link to the diagram created using tools like dbdiagram.io)

## Example of Initial Records (Seeds)
```sql
INSERT INTO users (name, email, password) VALUES ('Admin', 'admin@example.com', 'hashed_password');
INSERT INTO roles (name) VALUES ('Admin'), ('User');
INSERT INTO user_roles (user_id, role_id) VALUES (1, 1);
INSERT INTO categories (name) VALUES ('Hardware'), ('Software'), ('Educational Equipment');
INSERT INTO assets (name, category_id, description, status) VALUES ('Laptop', 1, 'Dell XPS 15', 'available'), ('Windows 10', 2, 'Operating System', 'available'), ('Projector', 3, 'Epson Projector', 'available');
INSERT INTO assignments (user_id, asset_id, assigned_at) VALUES (1, 1, '2025-03-12 15:00:00'), (1, 2, '2025-03-12 15:00:00'), (1, 3, '2025-03-12 15:00:00');
```
