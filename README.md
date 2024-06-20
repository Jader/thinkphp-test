## 目录结构

```
project_root/
|-- app/
|   |-- controller/
|   |   |-- Login.php
|   |-- middleware/
|   |   |-- AuthMiddleware.php
|   |-- service/
|   |   |-- UserService.php
|   |-- model/
|   |   |-- User.php
|   |-- dao/
|   |   |-- UserDao.php
|-- config/
|   |-- auth.php
|-- route/
|   |-- app.php
|-- composer.json

```

## 测试登录API

```sh
curl -X POST http://your_domain.com/user/login -d "username=your_username&password=your_password"
```

## 测试业务API

```sh
curl -X GET http://your_domain.combusiness/user/userinfo -H "Authorization: Bearer your_jwt_token"
```