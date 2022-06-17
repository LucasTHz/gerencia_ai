 @include('layouts.navbar')
  <div id="liveAlertPlaceholder">
    <div class="row">
      @if (session('error'))
      <p class="msg">{{ session('error') }}</p>
      @endif
    </div>
  </div>

  <main class="position-absolute w-25 top-50 start-50 translate-middle">
    <form method="POST" action="{{route('auth.authenticate')}}">
      @csrf
      <h1 class="h3 mb-3 fw-normal">Entre agora</h1>
      <div class="form-floating">
        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mt-4">
        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Senha</label>
      </div>

      <div class="checkbox mb-3 mt-4">
        <label>
          <input type="checkbox" value="remember-me"> Lembre-me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Entrar</button>
    </form>
  </main>


  