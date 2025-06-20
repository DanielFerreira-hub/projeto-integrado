# ISLA IT Asset Management – Database Schema Documentation

This document details the database schema for the ISLA IT Asset Management system, including tables, columns, example values, and all relationships.

---

## Table Explanations and Example Values

### 1. `users`

| Column      | Type      | Description                        | Example                |
|-------------|-----------|------------------------------------|------------------------|
| id          | int       | Primary key, auto-increment        | 1                      |
| name        | varchar   | Full name of the user              | "Alice Smith"          |
| email       | varchar   | User's email address (unique)      | "alice@isla.pt"        |
| password    | varchar   | Password hash                      | "$2y$10$abc..."        |
| role_id     | int       | FK to roles.id                     | 2                      |
| created_at  | datetime  | Record creation timestamp (auto)   | "2025-06-17 10:15:00"  |
| updated_at  | datetime  | Last update timestamp (auto)       | "2025-06-17 10:15:00"  |

**Constraints:**
- `email` is unique and required (NOT NULL)
- `role_id` is required (NOT NULL)

---

### 2. `roles`

| Column | Type    | Description | Example     |
|--------|---------|-------------|-------------|
| id     | int     | Primary key, auto-increment | 1           |
| name   | varchar | Role name (unique)   | "admin"     |

**Constraints:**
- `name` is unique and required (NOT NULL)

---

### 3. `locations`

| Column      | Type    | Description            | Example          |
|-------------|---------|------------------------|------------------|
| id          | int     | Primary key, auto-increment | 1                |
| name        | varchar | Location/room name (unique) | "Lab 1.01"       |
| description | varchar | Details (optional)     | "Computer lab"   |

**Constraints:**
- `name` is unique and required (NOT NULL)

---

### 4. `statuses`

| Column | Type    | Description          | Example         |
|--------|---------|----------------------|-----------------|
| id     | int     | Primary key, auto-increment | 1               |
| name   | varchar | Asset status (unique) | "in use"        |

**Constraints:**
- `name` is unique and required (NOT NULL)
- Common values: "in use", "in stock", "maintenance", "retired", "lost"

---

### 5. `hardware_assets`

| Column        | Type      | Description                                     | Example           |
|---------------|-----------|-------------------------------------------------|-------------------|
| id            | int       | Primary key, auto-increment                     | 1                 |
| name          | varchar   | Asset name (required)                           | "PC - Front Desk" |
| type          | varchar   | Type of hardware                                | "Desktop"         |
| brand         | varchar   | Brand                                           | "Dell"            |
| model         | varchar   | Model                                           | "OptiPlex 3080"   |
| serial_number | varchar   | Serial number                                   | "SN12345678"      |
| location_id   | int       | FK to locations.id (required)                   | 1                 |
| status_id     | int       | FK to statuses.id (required)                    | 1                 |
| purchase_date | date      | Purchase date                                   | "2024-09-20"      |
| notes         | text      | Free notes (optional)                           | "Replaced RAM"    |
| created_at    | datetime  | Record creation time (auto)                     | "2025-06-17 10:15"|
| updated_at    | datetime  | Last update time (auto)                         | "2025-06-17 10:15"|

**Constraints:**
- `name`, `location_id`, `status_id` are required (NOT NULL)
- `serial_number` is recommended to be unique if used

---

### 6. `software_assets`

| Column        | Type      | Description                                    | Example                 |
|---------------|-----------|------------------------------------------------|-------------------------|
| id            | int       | Primary key, auto-increment                    | 1                       |
| name          | varchar   | Software name (required)                       | "Windows 11 Pro"        |
| version       | varchar   | Version (required)                             | "22H2"                  |
| license_key   | varchar   | License key                                    | "XXXXX-XXXXX-XXXXX"     |
| hardware_id   | int       | FK to hardware_assets.id (assigned hardware)   | 1                       |
| status_id     | int       | FK to statuses.id (required)                   | 1                       |
| notes         | text      | Free notes (optional)                          | "License valid 2026"    |
| created_at    | datetime  | Record creation time (auto)                    | "2025-06-17 10:20"      |
| updated_at    | datetime  | Last update time (auto)                        | "2025-06-17 10:20"      |

**Constraints:**
- `name`, `version`, `status_id` are required (NOT NULL)
- `hardware_id` can be NULL if not assigned to hardware

---

### 7. `didactic_assets`

| Column        | Type      | Description                                 | Example                 |
|---------------|-----------|---------------------------------------------|-------------------------|
| id            | int       | Primary key, auto-increment                 | 1                       |
| name          | varchar   | Asset name (required)                       | "Epson Projector"       |
| type          | varchar   | Didactic asset type                         | "Projector"             |
| serial_number | varchar   | Serial number                               | "PJ123456789"           |
| location_id   | int       | FK to locations.id (required)               | 2                       |
| status_id     | int       | FK to statuses.id (required)                | 1                       |
| purchase_date | date      | Purchase date                               | "2023-04-15"            |
| notes         | text      | Free notes (optional)                       | "Lamp replaced 2024"    |
| created_at    | datetime  | Record creation time (auto)                 | "2025-06-17 10:21"      |
| updated_at    | datetime  | Last update time (auto)                     | "2025-06-17 10:21"      |

**Constraints:**
- `name`, `location_id`, `status_id` are required (NOT NULL)
- `serial_number` is recommended to be unique if used

---

### 8. `asset_images`

| Column      | Type      | Description                                   | Example                    |
|-------------|-----------|-----------------------------------------------|----------------------------|
| id          | int       | Primary key, auto-increment                   | 1                          |
| asset_type  | varchar   | 'hardware', 'software', or 'didactic'         | "hardware"                 |
| asset_id    | int       | Corresponding asset's id                      | 1                          |
| url         | varchar   | Image or document URL/path (required)         | "/images/assets/1-1.jpg"   |
| uploaded_at | datetime  | Upload timestamp (auto)                       | "2025-06-17 10:30"         |

**Polymorphic relationship:**  
`asset_type` + `asset_id` together reference a row in `hardware_assets`, `software_assets`, or `didactic_assets`.

**Constraints:**
- `asset_type` should be ENUM('hardware','software','didactic') if supported
- `asset_id` is required (NOT NULL)
- `url` is required (NOT NULL)

---

### 9. `maintenance_logs`

| Column           | Type      | Description                                 | Example                      |
|------------------|-----------|---------------------------------------------|------------------------------|
| id               | int       | Primary key, auto-increment                 | 1                            |
| asset_type       | varchar   | 'hardware', 'software', or 'didactic'       | "hardware"                   |
| asset_id         | int       | Corresponding asset's id                    | 1                            |
| user_id          | int       | FK to users.id (who did/performed the log)  | 2                            |
| maintenance_date | date      | Date of maintenance                         | "2025-05-10"                 |
| type             | varchar   | Maintenance type ("preventive", "corrective")| "preventive"                |
| description      | text      | Maintenance notes                           | "Cleaned dust filters"       |
| created_at       | datetime  | Record creation timestamp (auto)            | "2025-06-17 10:33"           |

**Polymorphic relationship:**  
`asset_type` + `asset_id` together reference a row in `hardware_assets`, `software_assets`, or `didactic_assets`.

**Constraints:**
- `asset_type` should be ENUM('hardware','software','didactic') if supported
- `asset_id`, `user_id` are required (NOT NULL)
- `maintenance_date` is required (NOT NULL)

---

## Table Relationships

### Direct Foreign Keys

| From Table         | Column         | To Table         | Column   | Type        |
|--------------------|---------------|------------------|----------|-------------|
| users              | role_id        | roles            | id       | FK          |
| didactic_assets    | location_id    | locations        | id       | FK          |
| didactic_assets    | status_id      | statuses         | id       | FK          |
| hardware_assets    | location_id    | locations        | id       | FK          |
| hardware_assets    | status_id      | statuses         | id       | FK          |
| software_assets    | status_id      | statuses         | id       | FK          |
| software_assets    | hardware_id    | hardware_assets  | id       | FK          |
| maintenance_logs   | user_id        | users            | id       | FK          |

---

### Polymorphic Relationships

| From Table        | Columns            | To Tables                                            | Type         |
|-------------------|-------------------|------------------------------------------------------|--------------|
| maintenance_logs  | asset_type, asset_id | hardware_assets / software_assets / didactic_assets | Polymorphic  |
| asset_images      | asset_type, asset_id | hardware_assets / software_assets / didactic_assets | Polymorphic  |

**Note:**  
- `asset_type` must be set as 'hardware', 'software', or 'didactic'.
- `asset_id` is the id of the respective asset in the asset table of the given type.
- Foreign key constraints on polymorphic pairs must be enforced at the application level, not the database.

**Example**:  
If an image is for a didactic asset, use  
- `asset_type = "didactic"`
- `asset_id = [id of row in didactic_assets]`

---

## Example Data Row

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

## Diagramming Instructions for SmartDraw

To create clear and professional database diagrams in SmartDraw:

### **Diagram #1: Main Entity-Relationship Diagram (ERD)**

- **Create a box for each table** (`users`, `roles`, `locations`, `statuses`, `hardware_assets`, `software_assets`, `didactic_assets`, `asset_images`, `maintenance_logs`).
- **List the columns** in each table inside the box.
- **Draw solid lines for direct foreign keys**:
    - users.role_id → roles.id
    - didactic_assets.location_id → locations.id
    - didactic_assets.status_id → statuses.id
    - hardware_assets.location_id → locations.id
    - hardware_assets.status_id → statuses.id
    - software_assets.status_id → statuses.id
    - software_assets.hardware_id → hardware_assets.id
    - maintenance_logs.user_id → users.id
- **Draw dashed or colored lines for polymorphic relations**:
    - From `maintenance_logs` and `asset_images` to each of `hardware_assets`, `software_assets`, and `didactic_assets`
    - Label these lines as “polymorphic reference: asset_type + asset_id”
- **(Optional) Add notes/legends** explaining what a polymorphic reference is.

### **Diagram #2: Asset Tables Detail**

- **Show just the three asset tables** (`hardware_assets`, `software_assets`, `didactic_assets`) and how `software_assets` connects to `hardware_assets`.
- **Show their connections to `locations` and `statuses`.**
- **Show example rows (optional)** under each table.

### **Diagram #3: Polymorphic Relationships Only**

- **Focus on `asset_images` and `maintenance_logs`**.
- **Show all three possible asset tables they can point to**.
- **Highlight the polymorphic relationship fields**.

---

## DBML for Reference

```dbml
Table users {
  id integer [pk, increment]
  name varchar
  email varchar [unique, not null]
  password varchar
  role_id integer [not null, ref: > roles.id]
  created_at datetime
  updated_at datetime
}

Table roles {
  id integer [pk, increment]
  name varchar [unique, not null]
}

Table locations {
  id integer [pk, increment]
  name varchar [unique, not null]
  description varchar
}

Table statuses {
  id integer [pk, increment]
  name varchar [unique, not null]
}

Table hardware_assets {
  id integer [pk, increment]
  name varchar [not null]
  type varchar
  brand varchar
  model varchar
  serial_number varchar
  location_id integer [not null, ref: > locations.id]
  status_id integer [not null, ref: > statuses.id]
  purchase_date date
  notes text
  created_at datetime
  updated_at datetime
}

Table software_assets {
  id integer [pk, increment]
  name varchar [not null]
  version varchar [not null]
  license_key varchar
  hardware_id integer [ref: > hardware_assets.id]
  status_id integer [not null, ref: > statuses.id]
  notes text
  created_at datetime
  updated_at datetime
}

Table didactic_assets {
  id integer [pk, increment]
  name varchar [not null]
  type varchar
  serial_number varchar
  location_id integer [not null, ref: > locations.id]
  status_id integer [not null, ref: > statuses.id]
  purchase_date date
  notes text
  created_at datetime
  updated_at datetime
}

Table asset_images {
  id integer [pk, increment]
  asset_type varchar [not null] // ENUM('hardware','software','didactic') if possible
  asset_id integer [not null]
  url varchar [not null]
  uploaded_at datetime
  Note: 'Polymorphic reference: asset_type + asset_id → hardware_assets, software_assets, or didactic_assets'
}

Table maintenance_logs {
  id integer [pk, increment]
  asset_type varchar [not null] // ENUM('hardware','software','didactic') if possible
  asset_id integer [not null]
  user_id integer [not null, ref: > users.id]
  maintenance_date date [not null]
  type varchar
  description text
  created_at datetime
  Note: 'Polymorphic reference: asset_type + asset_id → hardware_assets, software_assets, or didactic_assets'
}
```
