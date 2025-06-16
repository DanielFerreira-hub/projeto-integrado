# ISLA IT Asset Management – Database Schema

## General Structure

- **users, roles:** user management and access control.
- **locations:** physical locations for assets.
- **hardware_equipment:** computers, printers, etc.
- **software_equipment:** software, licenses, etc.
- **didactic_equipment:** didactic (educational) equipment (e.g., projectors, kits).
- **maintenance_logs:** maintenance records for any asset.
- **Attachments (photos, documents):** stored as fields (`photo_url`, `document_url`) in the equipment tables.

## Relationships

- A user has a role (**role_id** in **users**).
- Hardware and didactic equipment have a location (**location_id**).
- Software can be assigned to a hardware equipment (**assigned_to_hardware_id**).
- Maintenance log points to the responsible user, the equipment, and the type of equipment.

## Tables & Main Fields

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

### locations
- id (PK)
- name
- description

### hardware_equipment
- id (PK)
- name
- serial_number
- brand
- model
- location_id (FK → locations.id)
- status
- purchase_date
- warranty_expiration
- notes
- photo_url
- document_url
- created_at, updated_at

### software_equipment
- id (PK)
- name
- version
- vendor
- license_key
- valid_until
- assigned_to_hardware_id (FK → hardware_equipment.id, nullable)
- notes
- photo_url
- document_url
- created_at, updated_at

### didactic_equipment
- id (PK)
- name
- type
- serial_number
- location_id (FK → locations.id)
- status
- purchase_date
- notes
- photo_url
- document_url
- created_at, updated_at

### maintenance_logs
- id (PK)
- equipment_type (hardware, software, didactic)
- equipment_id (corresponding id)
- user_id (FK → users.id)
- maintenance_date
- description
- type (preventive, corrective)
- created_at

---

## Notes

- **Attachments** (such as photos or documents) are stored as URLs in the fields `photo_url` and `document_url` within the equipment tables, not in a separate table.
- **Maintenance logs** are generic and can be linked to any type of equipment by specifying both the equipment type and the equipment id.
- **software_equipment.assigned_to_hardware_id** can be `null` if not assigned to a particular hardware.

---

## Entity-Relationship Diagram

*Insert your exported drawSQL diagram image here!*
