@extends('index')

@section('title', 'TEST | Обратная связь')

@section('content')
    <section
        id="feedback-app"
        class="container main-container"
    >
        <feedback-form></feedback-form>
    </section>

    @vite(['resources/js/feedback_app.js'])

@endsection
