# ISLA IT Asset Management – Database Schema Documentation

This document describes the proposed database schema for the ISLA IT Asset Management system. It explains each table, its columns, and provides example values for each column. This schema is designed for clarity, normalization, and extensibility.

---

## 1. users

| Column       | Type    | Description                        | Example                |
|--------------|---------|------------------------------------|------------------------|
| id           | int     | Primary key, auto-increment        | 1                      |
| name         | string  | Full name of the user              | "Alice Smith"          |
| email        | string  | User's email address (unique)      | "alice@isla.pt"        |
| password     | string  | Password hash                      | "$2y$10$abc..."        |
| role_id      | int     | Foreign Key to roles.id            | 2                      |
| created_at   | datetime| Record creation timestamp          | "2025-06-17 10:15:00"  |
| updated_at   | datetime| Last update timestamp              | "2025-06-17 10:15:00"  |

---

## 2. roles

| Column | Type   | Description            | Example     |
|--------|--------|------------------------|-------------|
| id     | int    | Primary key            | 1           |
| name   | string | Role name              | "admin"     |

---

## 3. locations

| Column     | Type   | Description                 | Example          |
|------------|--------|-----------------------------|------------------|
| id         | int    | Primary key                 | 1                |
| name       | string | Room or location name       | "Lab 1.01"       |
| description| string | Additional details          | "Computer lab"   |

---

## 4. statuses

| Column | Type   | Description                    | Example         |
|--------|--------|--------------------------------|-----------------|
| id     | int    | Primary key                    | 1               |
| name   | string | Status of asset                | "in use"        |

Typical status values: "in use", "in stock", "maintenance", "retired", "lost".

---

## 5. hardware_assets

| Column        | Type    | Description                                      | Example            |
|---------------|---------|--------------------------------------------------|--------------------|
| id            | int     | Primary key                                      | 1                  |
| name          | string  | Asset name                                       | "PC - Front Desk"  |
| type          | string  | Hardware type                                    | "Desktop"          |
| brand         | string  | Brand/manufacturer                               | "Dell"             |
| model         | string  | Model                                            | "OptiPlex 3080"    |
| serial_number | string  | Serial number                                    | "SN12345678"       |
| location_id   | int     | FK to locations.id                               | 1                  |
| status_id     | int     | FK to statuses.id                                | 1                  |
| purchase_date | date    | Date of purchase                                 | "2024-09-20"       |
| notes         | text    | Free text notes                                  | "Replaced RAM 2025"|
| created_at    | datetime| Record creation timestamp                        | "2025-06-17 10:15" |
| updated_at    | datetime| Last update timestamp                            | "2025-06-17 10:15" |

---

## 6. software_assets

| Column             | Type    | Description                                 | Example               |
|--------------------|---------|---------------------------------------------|-----------------------|
| id                 | int     | Primary key                                 | 1                     |
| name               | string  | Name of the software                        | "Windows 11 Pro"      |
| version            | string  | Version                                     | "22H2"                |
| license_key        | string  | License key                                 | "XXXXX-XXXXX-XXXXX"   |
| hardware_id        | int     | FK to hardware_assets.id (assigned hardware)| 1                     |
| status_id          | int     | FK to statuses.id                           | 1                     |
| notes              | text    | Free text notes                             | "License valid until 2026" |
| created_at         | datetime| Record creation timestamp                   | "2025-06-17 10:20"    |
| updated_at         | datetime| Last update timestamp                       | "2025-06-17 10:20"    |

---

## 7. didactic_assets

| Column        | Type    | Description                                   | Example              |
|---------------|---------|-----------------------------------------------|----------------------|
| id            | int     | Primary key                                   | 1                    |
| name          | string  | Asset name                                    | "Epson Projector"    |
| type          | string  | Didactic asset type                           | "Projector"          |
| serial_number | string  | Serial number                                 | "PJ123456789"        |
| location_id   | int     | FK to locations.id                            | 2                    |
| status_id     | int     | FK to statuses.id                             | 1                    |
| purchase_date | date    | Date of purchase                              | "2023-04-15"         |
| notes         | text    | Free text notes                               | "Lamp replaced 2024" |
| created_at    | datetime| Record creation timestamp                     | "2025-06-17 10:21"   |
| updated_at    | datetime| Last update timestamp                         | "2025-06-17 10:21"   |

---

## 8. asset_images

| Column      | Type    | Description                              | Example                   |
|-------------|---------|------------------------------------------|---------------------------|
| id          | int     | Primary key                              | 1                         |
| asset_type  | string  | Type: 'hardware', 'software', 'didactic' | "hardware"                |
| asset_id    | int     | FK to asset table                        | 1                         |
| url         | string  | Image or document URL/path               | "/images/assets/1-1.jpg"  |
| uploaded_at | datetime| Upload timestamp                         | "2025-06-17 10:30"        |

---

## 9. maintenance_logs

| Column           | Type    | Description                              | Example                      |
|------------------|---------|------------------------------------------|------------------------------|
| id               | int     | Primary key                              | 1                            |
| asset_type       | string  | 'hardware', 'software', 'didactic'       | "hardware"                   |
| asset_id         | int     | FK to asset table                        | 1                            |
| user_id          | int     | FK to users.id (who performed/recorded)  | 2                            |
| maintenance_date | date    | Date maintenance was performed           | "2025-05-10"                 |
| type             | string  | Type of maintenance ("preventive", "corrective") | "preventive"         |
| description      | text    | Maintenance notes                        | "Cleaned dust filters"       |
| created_at       | datetime| Record creation timestamp                | "2025-06-17 10:33"           |

---

# Example Data Row

Here’s a sample row for each table (shown as a JSON object for illustration):

**users**
```json
{
  "id": 1,
  "name": "Alice Smith",
  "email": "alice@isla.pt",
  "password": "$2y$10$abc...",
  "role_id": 2,
  "created_at": "2025-06-17 10:15:00",
  "updated_at": "2025-06-17 10:15:00"
}
```
**roles**
```json
{
  "id": 2,
  "name": "it_staff"
}
```
**locations**
```json
{
  "id": 1,
  "name": "Lab 1.01",
  "description": "Computer lab near entrance"
}
```
**statuses**
```json
{
  "id": 1,
  "name": "in use"
}
```
**hardware_assets**
```json
{
  "id": 1,
  "name": "PC - Front Desk",
  "type": "Desktop",
  "brand": "Dell",
  "model": "OptiPlex 3080",
  "serial_number": "SN12345678",
  "location_id": 1,
  "status_id": 1,
  "purchase_date": "2024-09-20",
  "notes": "Replaced RAM 2025",
  "created_at": "2025-06-17 10:15:00",
  "updated_at": "2025-06-17 10:15:00"
}
```
**software_assets**
```json
{
  "id": 1,
  "name": "Windows 11 Pro",
  "version": "22H2",
  "license_key": "XXXXX-XXXXX-XXXXX",
  "hardware_id": 1,
  "status_id": 1,
  "notes": "License valid until 2026",
  "created_at": "2025-06-17 10:20:00",
  "updated_at": "2025-06-17 10:20:00"
}
```
**didactic_assets**
```json
{
  "id": 1,
  "name": "Epson Projector",
  "type": "Projector",
  "serial_number": "PJ123456789",
  "location_id": 2,
  "status_id": 1,
  "purchase_date": "2023-04-15",
  "notes": "Lamp replaced 2024",
  "created_at": "2025-06-17 10:21:00",
  "updated_at": "2025-06-17 10:21:00"
}
```
**asset_images**
```json
{
  "id": 1,
  "asset_type": "hardware",
  "asset_id": 1,
  "url": "/images/assets/1-1.jpg",
  "uploaded_at": "2025-06-17 10:30:00"
}
```
**maintenance_logs**
```json
{
  "id": 1,
  "asset_type": "hardware",
  "asset_id": 1,
  "user_id": 2,
  "maintenance_date": "2025-05-10",
  "type": "preventive",
  "description": "Cleaned dust filters",
  "created_at": "2025-06-17 10:33:00"
}
```

---

# Relationships

- **users.role_id** → **roles.id**
- **hardware_assets.location_id**, **didactic_assets.location_id** → **locations.id**
- **hardware_assets.status_id**, **software_assets.status_id**, **didactic_assets.status_id** → **statuses.id**
- **software_assets.hardware_id** → **hardware_assets.id**
- **asset_images.asset_type/asset_id**: points to a row in the respective asset table
- **maintenance_logs.asset_type/asset_id**: points to a row in the respective asset table
- **maintenance_logs.user_id** → **users.id**

---

# Notes

- This schema is normalized and ready for use in any RDBMS, including SQLite (with Laravel support).
- The asset_type/asset_id pattern for images and maintenance logs allows flexibility to attach records to any asset type.
- Statuses are controlled via a dedicated table for consistency.
- “Didactic assets” are separate for clarity, as you requested.

---

If you need a visual ER diagram or want to proceed with migrations, just ask!
