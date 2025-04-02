# API Documentation

## Objective
Explain the available endpoints in the backend.

## Authentication
### Example of Login and Tokens
```http
POST /api/login
Content-Type: application/json
{
  "email": "user@example.com",
  "password": "password"
}
```
Response:
```http
200 OK
{
  "token": "your_jwt_token"
}
```

## Endpoints

### Hardware Endpoints

#### `GET /api/hardware`
- **Description:** Returns the list of hardware.
- **Parameters:** None.
- **Usage Example:**
    ```bash
    curl -X GET http://yoursite.com/api/hardware
    ```

#### `POST /api/hardware`
- **Description:** Adds a new hardware item.
- **Parameters:**
    - `name` (string): Hardware name
    - `description` (string): Hardware description
    - `quantity` (integer): Available quantity
- **Usage Example:**
    ```bash
    curl -X POST http://yoursite.com/api/hardware \
    -H "Content-Type: application/json" \
    -d '{"name": "Laptop", "description": "Dell XPS 15", "quantity": 10}'
    ```

### Software Endpoints

#### `GET /api/software`
- **Description:** Returns the list of software.
- **Parameters:** None.
- **Usage Example:**
    ```bash
    curl -X GET http://yoursite.com/api/software
    ```

#### `POST /api/software`
- **Description:** Adds a new software item.
- **Parameters:**
    - `name` (string): Software name
    - `description` (string): Software description
    - `version` (string): Software version
- **Usage Example:**
    ```bash
    curl -X POST http://yoursite.com/api/software \
    -H "Content-Type: application/json" \
    -d '{"name": "Windows 10", "description": "Operating System", "version": "10.0"}'
    ```

### Educational Equipment Endpoints

#### `GET /api/educational_equipment`
- **Description:** Returns the list of educational equipment.
- **Parameters:** None.
- **Usage Example:**
    ```bash
    curl -X GET http://yoursite.com/api/educational_equipment
    ```

#### `POST /api/educational_equipment`
- **Description:** Adds a new educational equipment item.
- **Parameters:**
    - `name` (string): Equipment name
    - `description` (string): Equipment description
    - `quantity` (integer): Available quantity
- **Usage Example:**
    ```bash
    curl -X POST http://yoursite.com/api/educational_equipment \
    -H "Content-Type: application/json" \
    -d '{"name": "Projector", "description": "Epson Projector", "quantity": 5}'
    ```

## API Testing
Using Insomnia to test the endpoints.
