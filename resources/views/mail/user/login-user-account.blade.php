<x-mail::message>
# Блог

Успешный вход в аккаунт {{$email}}
    <x-mail::panel>
        Если это были не вы, поменяйте пароль
        <x-mail::button :url="route('password.email')" color="error">
            Поменять пароль
        </x-mail::button>
    </x-mail::panel>



<x-mail::button :url="route('home')">
На главную
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
