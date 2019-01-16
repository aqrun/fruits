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
    -d "email"="iFk2PbMZRBdiMdQz" \
    -d "password"="9lqzpyFCf0Z7jTff" 
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
    "email": "iFk2PbMZRBdiMdQz",
    "password": "9lqzpyFCf0Z7jTff",
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
    "token": "xxxx"
}
```
> Example response (401):

```json
{
    "error": "invalid_credentials"
}
```
> Example response (500):

```json
{
    "error": "could_not_create_token"
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

> Example response (405):

```json
{
    "message": "Token not provided",
    "status_code": 405,
    "debug": {
        "line": 173,
        "file": "\/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Response\/Factory.php",
        "class": "Symfony\\Component\\HttpKernel\\Exception\\HttpException",
        "trace": [
            "#0 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Response\/Factory.php(257): Dingo\\Api\\Http\\Response\\Factory->error('Token not provi...', 405)",
            "#1 \/home\/aqrun\/workspace\/www\/fruits\/app\/Http\/Controllers\/AuthenticateController.php(97): Dingo\\Api\\Http\\Response\\Factory->errorMethodNotAllowed('Token not provi...')",
            "#2 [internal function]: App\\Http\\Controllers\\AuthenticateController->getToken()",
            "#3 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Controller.php(54): call_user_func_array(Array, Array)",
            "#4 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/ControllerDispatcher.php(45): Illuminate\\Routing\\Controller->callAction('getToken', Array)",
            "#5 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(219): Illuminate\\Routing\\ControllerDispatcher->dispatch(Object(Illuminate\\Routing\\Route), Object(App\\Http\\Controllers\\AuthenticateController), 'getToken')",
            "#6 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Route.php(176): Illuminate\\Routing\\Route->runController()",
            "#7 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(682): Illuminate\\Routing\\Route->run()",
            "#8 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(30): Illuminate\\Routing\\Router->Illuminate\\Routing\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#9 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Middleware\/PrepareController.php(45): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#10 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Dingo\\Api\\Http\\Middleware\\PrepareController->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#11 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#12 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#13 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(684): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))",
            "#14 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(659): Illuminate\\Routing\\Router->runRouteWithinStack(Object(Illuminate\\Routing\\Route), Object(Dingo\\Api\\Http\\Request))",
            "#15 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(625): Illuminate\\Routing\\Router->runRoute(Object(Dingo\\Api\\Http\\Request), Object(Illuminate\\Routing\\Route))",
            "#16 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Router.php(614): Illuminate\\Routing\\Router->dispatchToRoute(Object(Dingo\\Api\\Http\\Request))",
            "#17 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Routing\/Adapter\/Laravel.php(81): Illuminate\\Routing\\Router->dispatch(Object(Dingo\\Api\\Http\\Request))",
            "#18 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Routing\/Router.php(512): Dingo\\Api\\Routing\\Adapter\\Laravel->dispatch(Object(Dingo\\Api\\Http\\Request), 'v1')",
            "#19 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(126): Dingo\\Api\\Routing\\Router->dispatch(Object(Dingo\\Api\\Http\\Request))",
            "#20 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(116): Dingo\\Api\\Http\\Middleware\\Request->Dingo\\Api\\Http\\Middleware\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#21 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/fideloper\/proxy\/src\/TrustProxies.php(57): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#22 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Fideloper\\Proxy\\TrustProxies->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#23 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(31): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#24 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#25 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/TransformsRequest.php(31): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#26 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#27 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/ValidatePostSize.php(27): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#28 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#29 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Middleware\/CheckForMaintenanceMode.php(62): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#30 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Illuminate\\Foundation\\Http\\Middleware\\CheckForMaintenanceMode->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#31 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Dingo\\Api\\Http\\Request))",
            "#32 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(127): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))",
            "#33 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/dingo\/api\/src\/Http\/Middleware\/Request.php(103): Dingo\\Api\\Http\\Middleware\\Request->sendRequestThroughRouter(Object(Dingo\\Api\\Http\\Request))",
            "#34 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(151): Dingo\\Api\\Http\\Middleware\\Request->handle(Object(Dingo\\Api\\Http\\Request), Object(Closure))",
            "#35 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Routing\/Pipeline.php(53): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Illuminate\\Http\\Request))",
            "#36 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Pipeline\/Pipeline.php(104): Illuminate\\Routing\\Pipeline->Illuminate\\Routing\\{closure}(Object(Illuminate\\Http\\Request))",
            "#37 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(151): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))",
            "#38 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Http\/Kernel.php(116): Illuminate\\Foundation\\Http\\Kernel->sendRequestThroughRouter(Object(Illuminate\\Http\\Request))",
            "#39 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(272): Illuminate\\Foundation\\Http\\Kernel->handle(Object(Illuminate\\Http\\Request))",
            "#40 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(256): Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy->callLaravelRoute(Object(Illuminate\\Http\\Request))",
            "#41 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseStrategies\/ResponseCallStrategy.php(33): Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy->makeApiCall(Object(Illuminate\\Http\\Request))",
            "#42 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(49): Mpociot\\ApiDoc\\Tools\\ResponseStrategies\\ResponseCallStrategy->__invoke(Object(Dingo\\Api\\Routing\\Route), Array, Array)",
            "#43 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/ResponseResolver.php(68): Mpociot\\ApiDoc\\Tools\\ResponseResolver->resolve(Array, Array)",
            "#44 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Tools\/Generator.php(54): Mpociot\\ApiDoc\\Tools\\ResponseResolver::getResponse(Object(Dingo\\Api\\Routing\\Route), Array, Array)",
            "#45 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(196): Mpociot\\ApiDoc\\Tools\\Generator->processRoute(Object(Dingo\\Api\\Routing\\Route), Array)",
            "#46 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/mpociot\/laravel-apidoc-generator\/src\/Commands\/GenerateDocumentation.php(57): Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->processRoutes(Object(Mpociot\\ApiDoc\\Tools\\Generator), Array)",
            "#47 [internal function]: Mpociot\\ApiDoc\\Commands\\GenerateDocumentation->handle()",
            "#48 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(29): call_user_func_array(Array, Array)",
            "#49 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(87): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()",
            "#50 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/BoundMethod.php(31): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))",
            "#51 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Container\/Container.php(572): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)",
            "#52 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(183): Illuminate\\Container\\Container->call(Array)",
            "#53 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/symfony\/console\/Command\/Command.php(255): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))",
            "#54 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Command.php(170): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))",
            "#55 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/symfony\/console\/Application.php(901): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#56 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/symfony\/console\/Application.php(262): Symfony\\Component\\Console\\Application->doRunCommand(Object(Mpociot\\ApiDoc\\Commands\\GenerateDocumentation), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#57 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/symfony\/console\/Application.php(145): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#58 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Console\/Application.php(89): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#59 \/home\/aqrun\/workspace\/www\/fruits\/vendor\/laravel\/framework\/src\/Illuminate\/Foundation\/Console\/Kernel.php(122): Illuminate\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#60 \/home\/aqrun\/workspace\/www\/fruits\/artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))",
            "#61 {main}"
        ]
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
    "user": "cccc"
}
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


