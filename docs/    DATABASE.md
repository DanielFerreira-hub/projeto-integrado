# Database Structure

## Objective
Define tables, relationships, and database schema for managing the assets of the ISLA-IPGT Informatics Park (hardware, software, and educational equipment), accessible via a browser in the back office.

## Tables and Columns

### `users` Table
- **ID:** Unique identifier
- **Name:** User name
- **Email:** User email (unique)
- **Password:** User password
- **Department:** User department
- **Role_id:** Identifier of the role (foreign key to `roles`)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `roles` Table
- **ID:** Unique identifier
- **Name:** Role name (e.g., Admin, User)

### `assets` Table
- **ID:** Unique identifier
- **Name:** Asset name
- **Category_id:** Identifier of the asset category (foreign key to `categories`)
- **Description:** Asset description
- **Status:** Asset status (e.g., available, in use, under maintenance)
- **Room_id:** Identifier of the room where the asset is located (foreign key to `rooms`)
- **Supplier_id:** Identifier of the supplier of the asset (foreign key to `suppliers`)
- **Purchase_date:** Purchase date of the asset
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

### `locations` Table
- **ID:** Unique identifier
- **Name:** Location name
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `suppliers` Table
- **ID:** Unique identifier
- **Name:** Supplier name
- **Contact_info:** Supplier contact information
- **Created_at:** Record creation date
- **Updated_at:** Record update date

### `rooms` Table
- **ID:** Unique identifier
- **Name:** Room name
- **Location_id:** Identifier of the location (foreign key to `locations`)
- **Created_at:** Record creation date
- **Updated_at:** Record update date

## Relationships
- **1:N:** One-to-many relationship between `roles` and `users` (one role has many users).
- **1:N:** One-to-many relationship between `categories` and `assets` (one category has many assets).
- **1:N:** One-to-many relationship between `users` and `assignments` (one user can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `assignments` (one asset can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `maintenance_logs` (one asset can have many maintenance logs).
- **1:N:** One-to-many relationship between `locations` and `rooms` (one location has many rooms).
- **1:N:** One-to-many relationship between `rooms` and `assets` (one room has many assets).
- **1:N:** One-to-many relationship between `assets` and `suppliers` (one supplier provides many assets).

## Database Diagram
[(ER diagram using tools dbdiagram.io)](https://dbdesigner.page.link/bXdebvYN9KBrwaUF6)

## Example of Initial Records (Seeds)
```sql
INSERT INTO users (name, email, password, department, role_id) VALUES ('Admin', 'admin@example.com', 'hashed_password', 'IT', 1);
INSERT INTO roles (name) VALUES ('Admin'), ('User');
INSERT INTO categories (name) VALUES ('Hardware'), ('Software'), ('Educational Equipment');
INSERT INTO locations (name) VALUES ('Main Building'), ('Annex Building');
INSERT INTO suppliers (name, contact_info) VALUES ('Dell', 'dell@example.com'), ('Microsoft', 'microsoft@example.com');
INSERT INTO rooms (name, location_id) VALUES ('Room 101', 1), ('Room 102', 1), ('Room 201', 2);
INSERT INTO assets (name, category_id, description, status, room_id, supplier_id, purchase_date) VALUES ('Laptop', 1, 'Dell XPS 15', 'available', 1, 1, '2025-01-15'), ('Windows 10', 2, 'Operating System', 'available', 1, 2, '2025-01-15'), ('Projector', 3, 'Epson Projector', 'available', 2, 1, '2025-01-15');
INSERT INTO assignments (user_id, asset_id, assigned_at) VALUES (1, 1, '2025-03-12'), (1, 2, '2025-03-12'), (1, 3, '2025-03-12');
```
