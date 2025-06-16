# ISLA IT Asset Management – Database Schema

## Entity-Relationship Diagram

[*Insert your exported drawSQL diagram image here!*](https://drawsql.app/teams/daniel-198/diagrams/isla-it-asset-management)

## Tables & Fields

### users
- id (PK)
- name
- email (unique)
- password (hashed)
- role_id (FK → roles.id)
- created_at, updated_at

### roles
- id (PK)
- name

### equipment
- id (PK)
- name
- equipment_type_id (FK → equipment_types.id)
- serial_number
- brand
- model
- location_id (FK → locations.id)
- status
- purchase_date
- warranty_expiration
- notes
- created_at, updated_at

### equipment_types
- id (PK)
- name
- description

### locations
- id (PK)
- name
- description

### maintenance_logs
- id (PK)
- equipment_id (FK → equipment.id)
- user_id (FK → users.id)
- maintenance_date
- description
- type (preventive, corrective)
- created_at

### licenses
- id (PK)
- name
- license_key
- valid_until
- equipment_id (FK → equipment.id)
- notes
- created_at

### attachments
- id (PK)
- equipment_id (FK → equipment.id)
- filename
- file_url
- uploaded_at

### software
- id (PK)
- name
- version
- vendor
- license_required
- created_at

### equipment_software
- id (PK)
- equipment_id (FK → equipment.id)
- software_id (FK → software.id)
- installed_at

## Relationships

- **users.role_id** → **roles.id**
- **equipment.equipment_type_id** → **equipment_types.id**
- **equipment.location_id** → **locations.id**
- **maintenance_logs.equipment_id** → **equipment.id**
- **maintenance_logs.user_id** → **users.id**
- **licenses.equipment_id** → **equipment.id**
- **attachments.equipment_id** → **equipment.id**
- **equipment_software.equipment_id** → **equipment.id**
- **equipment_software.software_id** → **software.id**
