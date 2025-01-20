<p align="center"><a href="https://laravel.com" target="_blank"><img src="readme.png" width="400" alt="Laravel Logo"></a></p>

<h1>Пет-проект на изучение монолита VueJs + InertiaJS + Laravel </h1>

### Для быстрого разворачивания использовался laravel Breeze  на VueJS

- Устанавливался laravel Breeze
- Для работы с формой и сессией сделана своя авторизация
- Для быстрой вёрстки использовалась библиотека FLowbite на Tailwind CSS 

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

```bash
npm install flowbite
```


# Бд брать на свой вкус и цвет =)

---

>### БД - sqlite (как развернуть написано в гайдах)
>>### Но если laravel не находит драйвер, переходим в php.ini в папку с php и раскоментчиваем драйвер БД с sqlite


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

---

## HandleInertiaRequests ___(Класс от Inertia JS)___ - здесь объявляются ключи сессии приложения

>### Это могут быть, как авторизация ___( или любая другая долго живущая сессия)___, так и flesh сообщения - в данном случае success и error

```php
public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
        ]);
    }
```

## В контроллере обычное объявления сообщения при редиректе, метод With()

```php
 public function login(LoginUserRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (!Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return back()->with(['errors'=> 'Ошибка авторизации']);
        }
        return to_route('home')->with(['success' => 'Успешный вход']);
    }
```

