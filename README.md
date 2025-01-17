<p align="center"><a href="https://laravel.com" target="_blank"><img src="readme.png" width="400" alt="Laravel Logo"></a></p>

<h1>Пет-проект на изучение монолита VueJs + InertiaJS + Laravel </h1>

### Для быстрого разворачивания использовался ~~laravel~~ ~~Breeze~~ самописное решение на VueJS

## Команды:

```bash
composer create-project laravel/laravel
```

```bash
composer require laravel/breeze --dev
```

```bash
php artisan breeze:install vue
```
# Бд брать на свой вкус и цвет :)

---

>### БД - sqlite (как развернуть написано в гайдах)
>### Но если laravel не находит драйвер, переходим в php.ini в папку с php и раскоментчиваем драйвер БД с sqlite


## В таком монолите используется подход как обычного монолита так и API ответов в виде JSON с помощью классов ___Resource___

## Пример ресурса

```php
class MiniPostResource extends JsonResource
{
  
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'userName' => $this->user->name,
            'title' => $this->title,
            'content' => $this->content,
            'createdAt' => $this->created_at
        ];
    }
}
```
## Сделано это для полного контроля данных, где требуется вывести часть данных по связи с другой таблицей
___
## В AppServiceProvider нужно закинуть свой ресурс для отключения обёртки data над JSON ___(вкусовщина по совей сути)___

```php
class AppServiceProvider extends ServiceProvider
{
  
    public function boot(): void
    {
        MiniPostResource::withoutWrapping();
    }
}
```
