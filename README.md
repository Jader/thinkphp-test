## 目录结构

```
project_root/
|-- app/
|   |-- controller/
|   |   |-- Login.php
|   |-- middleware/
|   |   |-- AuthMiddleware.php
|   |-- model/
|   |   |-- User.php
|-- config/
|   |-- auth.php
|-- route/
|   |-- app.php
|-- composer.json

```

## 测试登录API

```sh
curl -X POST http://your_domain.com/login -d "username=your_username&password=your_password"
```

## 测试业务API

```sh
curl -X GET http://your_domain.combusiness/test -H "Authorization: Bearer your_jwt_token"
```