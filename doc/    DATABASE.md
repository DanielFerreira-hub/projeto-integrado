# Database Structure

## Objective
Define tables, relationships, and database schema for managing the assets of the ISLA-IPGT Informatics Park (hardware, software, and educational equipment), accessible via a browser in the back office.

## Tables and Columns

users {
	created_at timestamp
	updated_at timestamp
	id int pk increments
	email varchar(255) unique
	name varchar(255)
	password varchar(255)
}

roles {
	id int pk increments
	name varchar(255)
	created_at timestamp
	updated_at timestamp
}

user_roles {
	user_id int > users.id
	role_id int > roles.id
	created_at timestamp
	updated_at timestamp
}

assets {
	id int pk increments
	name varchar(255)
	category_id int > categories.id
	description varchar(255)
	status varchar(50)
	room_id int > rooms.id
	supplier_id int > suppliers.id
	purchase_date date
	created_at timestamp
	updated_at timestamp
}

categories {
	id int pk increments
	name varchar(255) unique
	created_at timestamp
	updated_at timestamp
}

assignments {
	id int pk increments
	user_id int > users.id
	asset_id int > assets.id
	assigned_at date
	returned_at date
	created_at timestamp
	updated_at timestamp
}

maintenance_logs {
	id int pk increments
	asset_id int > assets.id
	description text
	performed_at date
	created_at timestamp
	updated_at timestamp
}

locations {
	id int pk increments
	name varchar(255)
	created_at timestamp
	updated_at timestamp
}

suppliers {
	id int pk increments
	name varchar(255)
	contact_info varchar(255)
	created_at timestamp
	updated_at timestamp
}

rooms {
	id int pk increments
	name varchar(255)
	location_id int > locations.id
	created_at timestamp
	updated_at timestamp
}

## Relationships
- **1:N:** One-to-many relationship between `categories` and `assets` (one category has many assets).
- **1:N:** One-to-many relationship between `users` and `assignments` (one user can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `assignments` (one asset can have many assignments).
- **1:N:** One-to-many relationship between `assets` and `maintenance_logs` (one asset can have many maintenance logs).
- **1:N:** One-to-many relationship between `locations` and `rooms` (one location has many rooms).
- **1:N:** One-to-many relationship between `rooms` and `assets` (one room has many assets).
- **1:N:** One-to-many relationship between `assets` and `suppliers` (one supplier provides many assets).
- **N:M:** Many-to-many relationship between `users` and `roles` (through `user_roles`).

## Database Diagram
(Include ER diagram here or provide a link to the diagram created using tools like dbdiagram.io)

## Example of Initial Records (Seeds)
```sql
INSERT INTO users (name, email, password) VALUES ('Admin', 'admin@example.com', 'hashed_password');
INSERT INTO roles (name) VALUES ('Admin'), ('User');
INSERT INTO user_roles (user_id, role_id) VALUES (1, 1);
INSERT INTO categories (name) VALUES ('Hardware'), ('Software'), ('Educational Equipment');
INSERT INTO locations (name) VALUES ('Main Building'), ('Annex Building');
INSERT INTO suppliers (name, contact_info) VALUES ('Dell', 'dell@example.com'), ('Microsoft', 'microsoft@example.com');
INSERT INTO rooms (name, location_id) VALUES ('Room 101', 1), ('Room 102', 1), ('Room 201', 2);
INSERT INTO assets (name, category_id, description, status, room_id, supplier_id, purchase_date) VALUES ('Laptop', 1, 'Dell XPS 15', 'available', 1, 1, '2025-01-15'), ('Windows 10', 2, 'Operating System', 'available', 1, 2, '2025-01-15'), ('Projector', 3, 'Epson Projector', 'available', 2, 1, '2025-01-15');
INSERT INTO assignments (user_id, asset_id, assigned_at) VALUES (1, 1, '2025-03-12'), (1, 2, '2025-03-12'), (1, 3, '2025-03-12');
```
