# Inventory App API

## Base URL

`https://127.0.0.1:8000/api`.

## Authentication

Semua route yang dilindungi memerlukan token Bearer. Token diberikan setelah berhasil login.

### Headers

```plaintext
Authorization: Bearer <auth_token>
```

---

## Endpoints

### 1. Login

**POST** `/login`

#### Request Body

```json
{
    "email": "string",
    "password": "string"
}
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": {
            "token": "string"
        },
        "message": "Login berhasil"
    }
    ```
-   **Failure**:
    ```json
    {
        "status": false,
        "data": null,
        "message": "Login gagal"
    }
    ```

---

### 2. Logout

**POST** `/logout`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": null,
        "message": "logout berhasil"
    }
    ```

---

### 3. Get Profile

**GET** `/profile`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": {
            "id": "integer",
            "name": "string",
            "email": "string",
            "created_at": "timestamp",
            "updated_at": "timestamp"
        },
        "message": "Sukses mendapatkan data user"
    }
    ```

---

### 4. Update Profile

**PUT** `/profile`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Request Body

```json
{
    "name": "string",
    "email": "string"
}
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": "integer user->id",
        "message": "Sukses mengubah data user"
    }
    ```

---

### 5. Add Inventory

**POST** `/inventory`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Request Body

```json
{
    "name": "string",
    "stock": "integer"
}
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": "integer inventory->id",
        "message": "Sukses menambahkan inventory"
    }
    ```

---

### 6. Update Inventory

**PUT** `/inventory/{id}`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Request Body

```json
{
    "name": "string",
    "stock": "integer"
}
```

#### Response

-   **Success**:

    ```json
    {
        "status": true,
        "data": "integer user->id",
        "message": "Sukses mengubah inventory"
    }
    ```

-   **Failure**:
    ```json
    {
        "status": false,
        "data": null,
        "message": "Gagal mengubah inventory"
    }
    ```

---

### 7. Delete Inventory

**DELETE** `/inventory/{id}`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": null,
        "message": "Sukses menghapus inventory"
    }
    ```
-   **Failure**:
    ```json
    {
        "status": false,
        "data": null,
        "message": "Gagal menghapus inventory"
    }
    ```

---

### 8. List Inventory

**GET** `/inventory`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": {
            "users": [
                {
                    "id": "integer",
                    "name": "string",
                    "email": "string",
                    "created_at": "timestamp",
                    "updated_at": "timestamp"
                }
            ],
            "inventories": [
                {
                    "id": "integer",
                    "name": "string",
                    "stock": "integer",
                    "created_at": "timestamp",
                    "updated_at": "timestamp"
                }
            ]
        },
        "message": "Sukses menampilkan semua inventory"
    }
    ```

---

### 9. Get Inventory by ID

**GET** `/inventory/{id}`

#### Request Headers

```plaintext
Authorization: Bearer <auth_token>
```

#### Response

-   **Success**:
    ```json
    {
        "status": true,
        "data": {
            "id": "integer",
            "name": "string",
            "stock": "integer",
            "created_at": "timestamp",
            "updated_at": "timestamp"
        },
        "message": "Sukses menampilkan inventory"
    }
    ```
-   **Failure**:
    ```json
    {
        "status": false,
        "data": null,
        "message": "Gagal menampilkan inventory"
    }
    ```
