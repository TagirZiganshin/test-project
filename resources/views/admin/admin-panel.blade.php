@extends("welcome")
@section("title", "Страница Создание Поста")
@section("content")
<form method="POST" action={{asset(route("admin-panel-create"))}} enctype="multipart/form-data" class="container border border-3 border-warning rounded my-3 p-3">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Фото</label>
    <input name="image" type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required minlength="6">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Описание</label>
    <input name="description" type="text" class="form-control" id="exampleInputPassword1" required minlength="6">
  </div>	
  <button type="submit" class="btn btn-warning">Создать</button>
</form>
@endsection