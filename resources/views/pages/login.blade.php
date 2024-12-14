@extends("welcome")
@section("title", "Страница Авторизации")
@section("content")
<form method="POST" action={{asset(route("login-auth"))}} class="container border border-3 border-warning rounded my-3 p-3">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Адресс</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required minlength="6">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" required minlength="6">
  </div>
  <button type="submit" class="btn btn-warning">Зарегистрироваться</button>
</form>
@if($errors->has("loginerrors"))
<div class="container alert alert-danger">
  {{$errors->first("loginerrors")}}
</div>
@endif
@endsection