# ISLA IT Asset Management – Complete Database Schema

## Overview

This document describes the complete database schema for a robust IT asset management system suitable for educational institutions (schools, universities, etc.). The system is designed to handle hardware, software, didactic assets, users, maintenance, suppliers, warranties, and more, with a focus on flexibility, traceability, and professional practices.

---

## Main Entities

### Users and Permissions

- **users**: Stores all users (admins, technicians, teachers, etc.), including access credentials, role, and department.
- **roles**: Defines user roles/permissions (admin, technician, etc.).
- **departments**: (Optional) For grouping users and assets by department, course, or sector.

### Locations and Suppliers

- **locations**: Physical locations of assets (labs, rooms, buildings), optionally linked to a department.
- **suppliers**: Information about companies or people supplying assets or warranties.

### Assets

- **hardware_assets**: All IT hardware—computers, switches, printers, etc.—with inventory/tag, warranty, supplier, and location.
- **software_assets**: Licenses, applications, or systems, with version, license key, supplier, and assignment to hardware (optional).
- **didactic_assets**: Didactic or educational equipment—projectors, boards, laboratory kits, etc.

### Supporting Tables

- **asset_tags**: Unique inventory codes/tags (e.g., QR code or sticker) for tracking any asset.
- **warranties**: Warranty details for any asset, with supplier and digital copy.
- **asset_photos**: Photos or documents attached to any asset—can be images, PDF invoices, etc.

### Maintenance and Tracking

- **maintenance_logs**: Maintenance or repair records for any asset, with history and responsible technician.
- **asset_assignments**: Tracks to whom or where a given asset is assigned (for example, “Laptop X is with Teacher Y in Room 103”).
- **logs**: System activity logs for auditing.
- **notifications**: Alerts for users (e.g., maintenance due, warranty expiring).

---

## Table Structure

### 1. Users, Roles, Departments

| Table         | Description                                  |
|---------------|----------------------------------------------|
| users         | All users of the system                      |
| roles         | User role (admin, technician, etc.)          |
| departments   | Optional, for grouping users/assets          |

**users**
- id (PK)
- name
- email (unique)
- password (hashed)
- role_id (FK → roles.id)
- department_id (FK → departments.id, nullable)
- status
- created_at, updated_at

**roles**
- id (PK)
- name
- description

**departments**
- id (PK)
- name
- description

---

### 2. Locations and Suppliers

**locations**
- id (PK)
- name
- department_id (FK → departments.id, nullable)
- description

**suppliers**
- id (PK)
- name
- contact_name
- contact_email
- phone
- address
- notes

---

### 3. Assets

**hardware_assets**
- id (PK)
- name
- type (e.g., Laptop, Printer)
- brand
- model
- serial_number
- asset_tag_id (FK → asset_tags.id)
- location_id (FK → locations.id)
- department_id (FK → departments.id, nullable)
- purchase_date
- warranty_id (FK → warranties.id, nullable)
- supplier_id (FK → suppliers.id, nullable)
- status (in use, in stock, broken, etc.)
- notes
- created_at, updated_at

**software_assets**
- id (PK)
- name
- version
- license_key
- supplier_id (FK → suppliers.id, nullable)
- purchase_date
- valid_until
- assigned_to_hardware_id (FK → hardware_assets.id, nullable)
- status (active, expired, etc.)
- notes
- created_at, updated_at

**didactic_assets**
- id (PK)
- name
- type (e.g., Projector, Kit)
- brand
- model
- serial_number
- asset_tag_id (FK → asset_tags.id)
- location_id (FK → locations.id)
- department_id (FK → departments.id, nullable)
- purchase_date
- warranty_id (FK → warranties.id, nullable)
- supplier_id (FK → suppliers.id, nullable)
- status
- notes
- created_at, updated_at

---

### 4. Tags, Warranties, Attachments

**asset_tags**
- id (PK)
- code (unique)
- qr_code_url
- created_at

**warranties**
- id (PK)
- warranty_number
- supplier_id (FK → suppliers.id, nullable)
- start_date
- end_date
- terms
- file_url

**asset_photos**
- id (PK)
- asset_type (hardware, software, didactic)
- asset_id (id of the asset)
- file_url
- uploaded_by (FK → users.id)
- uploaded_at

---

### 5. Maintenance, Assignments, Logs

**maintenance_logs**
- id (PK)
- asset_type (hardware, software, didactic)
- asset_id (id of the asset)
- maintenance_type (preventive, corrective, etc.)
- description
- maintenance_date
- performed_by (FK → users.id)
- status (pending, done, etc.)
- created_at

**asset_assignments**
- id (PK)
- asset_type (hardware, software, didactic)
- asset_id (id of the asset)
- assigned_to_user_id (FK → users.id, nullable)
- assigned_to_location_id (FK → locations.id, nullable)
- assigned_date
- returned_date
- status
- notes

**logs**
- id (PK)
- user_id (FK → users.id)
- action (e.g., create, update, delete)
- table_name
- record_id
- description
- created_at

**notifications**
- id (PK)
- user_id (FK → users.id)
- type
- message
- is_read (boolean)
- created_at

---

## Relationships & Design Rationale

- **Separation by asset type** (hardware, software, didactic): allows specific fields per asset and easier expansion in the future.
- **asset_type + asset_id** pattern: enables maintenance, attachments, and assignments to be linked to any asset type in a clean, scalable way.
- **Attachments are not inline fields**; instead, they are stored in a separate table and can be linked to any asset (for storing multiple images/docs per asset).
- **Departments** and **locations**: allow both physical (room, building) and organizational (department, area) tracking.
- **Suppliers** and **warranties**: centralized, so you can track supplier contact, warranty periods, and attach scanned files.
- **Asset tags**: for physical labeling and inventory (QR/barcode).
- **Asset assignments**: enables tracking the history of where/with whom an asset is at any time.
- **Maintenance logs**: full service/repair history for compliance, warranties, and audits.
- **Logs and notifications**: for accountability, security, and user engagement.

---

## Example Usage Scenarios

- **A laptop is purchased:**  
  Entered as a `hardware_asset`, linked to a location, supplier, warranty, and asset tag.
- **Windows license for the laptop:**  
  Entered as a `software_asset`, assigned to the laptop, with license details and supplier.
- **A projector (didactic asset):**  
  Tracked in `didactic_assets` with location, tag, and optional warranty.
- **Photos/scans:**  
  Attach invoice/photo via `asset_photos` (linked by asset type/id).
- **Maintenance:**  
  Any asset can have maintenance logs, performed by a user.
- **Movement:**  
  Use `asset_assignments` to track when assets change rooms/users.

---

## Extending the System

This schema is modular and can be expanded easily:
- Add more asset types (e.g., vehicles, furniture) using the same asset_type/asset_id approach.
- Add more fields or relationships as needed (e.g., custom fields per asset type).
- Integrate with authentication/authorization (e.g., Laravel Sanctum, OAuth).
- Automate notifications (e.g., warranty expiring, scheduled maintenance).

---

## Diagram

*Attach the ERD diagram exported from drawSQL or another tool here.*

---

## Conclusion

This schema enables complete, auditable IT asset management for schools and universities, supporting all major needs: asset registry, maintenance, movement, attachments, and user roles.  
For implementation, create migrations for each table following the above structure and set up foreign keys for data integrity.

If you need the Laravel migration files for this schema, ask and they can be generated for you!

## Entity-Relationship Diagram

*Insert your exported drawSQL diagram image here!*
