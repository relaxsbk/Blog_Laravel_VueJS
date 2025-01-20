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
## Обращение во Vue js к таким элементам, IDE не видит их и будет подчёркивать что не знает такого
```vue
 <div  v-show="$page.props.flash.success" class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800  mx-auto max-w-4xl" role="alert">
    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
    </svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">{{ $page.props.flash.success}}</span>
    </div>
</div>
```

---

# Отправка писем
### В данном ситуации использовался новый почтовый ящик Яндекса, в env прописаны ключевые данные. 

```dotenv
MAIL_MAILER=smtp
MAIL_HOST=smtp.yandex.ru
MAIL_PORT='который указан у яндекса'
MAIL_USERNAME="Ваша почта"
MAIL_PASSWORD="Пароль который указал яндекс"
MAIL_FROM_ADDRESS="Дублирование вашей почты"
MAIL_FROM_NAME="${APP_NAME}"
```
## Вызов класса в конце метода для отправки письма

```php
// отправка на свою же почту(решение не в продакшн)
Mail::to(env('MAIL_USERNAME'))->send(new LoginUserAccount($email));
```
>### Создание класса mail с шаблоном
```bash
php artisan make:mail User/LoginUserAccount -m
```

## Класс от Mailable
>### В нём конструктор нужен для передачи данных, остальное редактируется только по документации
```php
class LoginUserAccount extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $email,
    )
    {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Login User Account',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.user.login-user-account',
        );
    }
```


