---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_d5417ec5d425f04b71e9a4e9987c8295 -->
## Token request

api login on success return jwt auth token

> Example request:

```bash
curl -X POST "/api/authenticate" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1" \
    -d "email"="qqlCdXV7rqflFlMB" \
    -d "password"="Ce4lUxNy2BCHr41d" 
```

```javascript
const url = new URL("/api/authenticate");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = JSON.stringify({
    "email": "qqlCdXV7rqflFlMB",
    "password": "Ce4lUxNy2BCHr41d",
})

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "code": 0,
    "msg": "success",
    "result": {
        "token": "xxx"
    }
}
```
> Example response (200):

```json
{
    "code": 4001,
    "msg": "invalid_credentials",
    "result": []
}
```
> Example response (200):

```json
{
    "code": 500,
    "msg": "could_not_create_token",
    "result": []
}
```

### HTTP Request
`POST /api/authenticate`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | email
    password | string |  required  | password

<!-- END_d5417ec5d425f04b71e9a4e9987c8295 -->

<!-- START_39798dab89951f0e0c3fc59a53f859e5 -->
## log out

> Example request:

```bash
curl -X POST "/api/logout" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/logout");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST /api/logout`


<!-- END_39798dab89951f0e0c3fc59a53f859e5 -->

<!-- START_65248d073c7d20410a6e8642cb30abc5 -->
## refresh the token

> Example request:

```bash
curl -X GET -G "/api/token" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/token");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "code": 1,
    "msg": "Token not provided",
    "result": {
        "null": 1
    }
}
```

### HTTP Request
`GET /api/token`


<!-- END_65248d073c7d20410a6e8642cb30abc5 -->

<!-- START_8b3add0e3f7c720bef6c70d07cbd437e -->
## /api/fruits
> Example request:

```bash
curl -X GET -G "/api/fruits" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/fruits");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Aa",
            "color": "Red",
            "weight": "175 grams",
            "delicious": true
        }
    ]
}
```

### HTTP Request
`GET /api/fruits`


<!-- END_8b3add0e3f7c720bef6c70d07cbd437e -->

<!-- START_ac0618938d4d6053ef044ce99e829d75 -->
## /api/fruit/{id}
> Example request:

```bash
curl -X GET -G "/api/fruit/{id}" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/fruit/{id}");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Aa",
        "color": "Red",
        "weight": "175 grams",
        "delicious": true
    }
}
```

### HTTP Request
`GET /api/fruit/{id}`


<!-- END_ac0618938d4d6053ef044ce99e829d75 -->

<!-- START_86a74ead16f16378741b31960309f15f -->
## returns the authenticated user

> Example request:

```bash
curl -X GET -G "/api/authenticated_user" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/authenticated_user");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "user": {
        "id": 1,
        "name": "alex",
        "email": "alex@qq.com",
        "email_verified_at": null,
        "created_at": "2019-01-15 07:40:31",
        "updated_at": "2019-01-15 07:40:31"
    }
}
```
> Example response (400):

```json
{}
```
> Example response (404):

```json
{}
```

### HTTP Request
`GET /api/authenticated_user`


<!-- END_86a74ead16f16378741b31960309f15f -->

<!-- START_7911c9ccc13ab3b52c29a3f7473bfa19 -->
## /api/fruits
> Example request:

```bash
curl -X POST "/api/fruits" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/fruits");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST /api/fruits`


<!-- END_7911c9ccc13ab3b52c29a3f7473bfa19 -->

<!-- START_e839e2c58cf3045a3add8543207c9de4 -->
## /api/fruits/{id}
> Example request:

```bash
curl -X DELETE "/api/fruits/{id}" \
    -H "Authorization: Bearer {token}" \
    -H "Api-Version: v1"
```

```javascript
const url = new URL("/api/fruits/{id}");

let headers = {
    "Authorization": "Bearer {token}",
    "Api-Version": "v1",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`DELETE /api/fruits/{id}`


<!-- END_e839e2c58cf3045a3add8543207c9de4 -->


