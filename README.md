Тестовое задание для Eclipse Digital Studio 
====

Для поднятия проекта нужно:
---
+ Склонировать репу
+ Установить пакеты через ``composer install``
+ Запустить проект `` ./vendor/bin/sail up``
+ Указать данные для подключения к БД в ``.env``
+ Запустить миграции ``php artisan migrate``

Endpoints
---
+ ``/api/articles`` - список, GET запрос
+ ``/api/articles`` - создание нового, POST запрос
+ ``/api/articles/{id}`` - редактирование по ID, PUT/PATCH запрос
+ ``/api/articles/{id}`` - удаление по ID, DELETE запрос
