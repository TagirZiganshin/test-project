
@extends("welcome")
@section("title", "Страница Адимна")
@section("content")
<div class="row container mx-auto my-3 gap-3">
@foreach($tasks as $task)
<div class="col-md border border-3 border-warning rounded">
    <h5>Описание: {{$task->description}}</h5>
    <h3>Фото:</h3>
    <div class="w-45">
        <img src={{asset("/public/uploads/" . $task->image)}} class="mw-100">
    </div>
    <form method="POST" action={{asset(route("admin-panel-update", $task->id))}} id='selectform-{{$task->id}}'>
        <select name="status" onchange="document.getElementById('selectform-{{$task->id}}').submit()">
        @foreach($statuses as $status)
        <option value={{$status->id}} {{$status->id == $task->id_status ? "selected" : ""}}>
            {{$status->name}}
        </option>
        @endforeach
        </select>
    </form>
</div>
@endforeach
</div>
@endsection