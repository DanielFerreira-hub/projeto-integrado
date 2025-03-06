# Database Structure

## Objective
Define tables, relationships, and database schema.

## Tables and Columns

### `hardware` Table
- **ID:** Unique identifier
- **Name:** Hardware name
- **Description:** Hardware description
- **Quantity:** Available quantity

### `software` Table
- **ID:** Unique identifier
- **Name:** Software name
- **Description:** Software description
- **Version:** Software version

### `educational_equipment` Table
- **ID:** Unique identifier
- **Name:** Equipment name
- **Description:** Equipment description
- **Quantity:** Available quantity

## Relationships
- **1:N:** One-to-many relationship between tables.
- **N:M:** Many-to-many relationship between tables.

## Database Diagram
(Include ER diagram here or provide a link to the diagram created using tools like dbdiagram.io)

## Example of Initial Records (Seeds)
```sql
INSERT INTO hardware (name, description, quantity) VALUES ('Laptop', 'Dell XPS 15', 10);
INSERT INTO software (name, description, version) VALUES ('Windows 10', 'Operating System', '10.0');
INSERT INTO educational_equipment (name, description, quantity) VALUES ('Projector', 'Epson Projector', 5);
```
