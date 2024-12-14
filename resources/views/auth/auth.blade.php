@extends("welcome")
@section("title", "Страница Пользователя")
@section("content")
<h2>Все посты:</h2>
<div class="row container mx-auto my-3 gap-3">
@foreach($tasks as $task)
<div class="col-md border border-3 border-warning rounded">
    <h5>Описание: {{$task->description}}</h5>
    <h3>Фото:</h3>
    <div class="w-45">
        <img src={{asset("/public/uploads/" . $task->image)}} class="mw-100">
    </div>
    <form method="POST" action={{asset(route("progress-check", $task->id))}} class="my-3">
        <button type="submit" class="btn btn-warning">забронировать</button>
    </form>
</div>
@endforeach
</div>

<h1>Все забронирование посты:</h1>
<div class="row container mx-auto my-3 gap-3">
@foreach($tasks as $task)
@if($task->status->code == 'progress')
        <div class="col-md border border-3 border-warning rounded">
            <h5>Описание: {{$task->description}}</h5>
            <h3>Фото:</h3>
            <div class="w-45">
                <img src={{asset("/public/uploads/" . $task->image)}} class="mw-100">
            </div>
        </div>
    @endif
@endforeach
</div>
@endsection