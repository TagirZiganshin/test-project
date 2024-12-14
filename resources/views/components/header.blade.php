<nav class="navbar navbar-expand-lg bg-body-tertiary border border-3 border-info rounded m-3 px-4">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        @auth
        @if(auth()->user()->role->code == "admin")
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("admin"))}}>Админ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("admin-panel"))}}>Создание Поста</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("logout"))}}>Выйти</a>
        </li>
@else
<li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("auth"))}}>Пользователь</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("logout"))}}>Выйти</a>
        </li>
        @endif
        @else
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("home"))}} >Домой</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("register"))}}>Зарегистрироваться</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href={{asset(route("login"))}}>Войти</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>