# Тестовое задание

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
