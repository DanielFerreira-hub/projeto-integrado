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

### `assets` Table
- **ID:** Unique identifier
- **Name:** Asset name
- **Category_id:** Identifier of the asset category (foreign key to `categories`)
- **Description:** Asset description
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
- **Created_at:** Record creation date
- **Updated_at:** Record update date

## Relationships
- **1:N:** One-to-many relationship between `categories` and `assets` (one category has many assets).
- **1:N:** One-to-many relationship between `users` and `assignments` (one user can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `assignments` (one asset can have many assignments).

## Database Diagram
(Include ER diagram here or provide a link to the diagram created using tools like dbdiagram.io)

## Example of Initial Records (Seeds)
```sql
INSERT INTO users (name, email, password) VALUES ('Admin', 'admin@example.com', 'hashed_password');
INSERT INTO categories (name) VALUES ('Hardware'), ('Software'), ('Educational Equipment');
INSERT INTO assets (name, category_id, description) VALUES ('Laptop', 1, 'Dell XPS 15'), ('Windows 10', 2, 'Operating System'), ('Projector', 3, 'Epson Projector');
INSERT INTO assignments (user_id, asset_id, assigned_at) VALUES (1, 1, '2025-03-12 15:00:00'), (1, 2, '2025-03-12 15:00:00'), (1, 3, '2025-03-12 15:00:00');
```
