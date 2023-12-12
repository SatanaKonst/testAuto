# Тестовое задание

## Запуск
1. Скопировать env
```shell
cp ./env ./.env && ./applocation/.env.example ./applocation/.env
```
2. Заполнить env (Подключение к базе и адрес сайта. Указать порт 8888 если не меняется в контейнере)
3. Запустить контейнер
```shell
docker compose up -d
```
4. Зайти в контейнер и установить зависимости, миграции и посевы
```shell
docker exec -it webserver /bin/bash
cd /var/www && compose install && php artisan migrate && php artisan db:seed
```
5. Зайти на сайт http://localhost:8888/admin

> Тестовые пользователь
> Логин: admin@test.ru
> Пароль: admin

## Генерация phpDoc для моделей

```shell
 php artisan eloquent:bulk-phpdoc "app/Models/*.php"
```

# API

### Список машин

```http request
Method:GET
/api/cars?filter[id]=1

filter - доступны все поля для фильтрации. Логическое И.
```

### Добавить машину

```http request
Method:POST
/api/carAdd

Поля формы:
mark_id - id марки. Обязательное
model_id - id модели. Обязательное
year - Год (Y-m-d)
color - Цвет (Hex)
mileage - пробег
```

### Обновить машину

```http request
Method:POST
/api/carUpdate

Поля формы:
id - id Машины
mark_id - id марки. Обязательное
model_id - id модели. Обязательное
year - Год (Y-m-d)
color - Цвет (Hex)
mileage - пробег
```

### Удалить машину

```http request
Method:POST
/api/carDelete

Поля формы:
id - id Машины
```

## Список марок

```http request
Method:GET
/api/carMarks?filter[id]=1

filter - доступны все поля для фильтрации. Логическое И.
```

## Список моделей

```http request
Method:GET
/api/carModels?filter[id]=1

filter - доступны все поля для фильтрации. Логическое И.
```
