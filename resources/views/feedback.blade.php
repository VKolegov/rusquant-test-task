@extends('index')

@section('title', 'Рус Квант Тестовое | Обратная связь')

@section('content')
    <section
        id="feedback-app"
        class="container main-container"
    >
        <feedback-form></feedback-form>
    </section>

    @vite(['resources/js/feedback_app.js'])

@endsection
