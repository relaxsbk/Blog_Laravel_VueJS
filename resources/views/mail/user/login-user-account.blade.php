<x-mail::message>
# Introduction

Успешный вход в аккаунт {{$email}}

<x-mail::button :url="route('home')">
На главную
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
