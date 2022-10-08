@include('layouts.navbar')
<div id="liveAlertPlaceholder">
    <div class="row">
        @if (session('error'))
        <p class="msg">{{ session('error') }}</p>
        @endif
    </div>
</div>
<!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-50">
  <body class="h-full">
  ```
-->
<div class="flex min-h-full items-center justify-center py-4 px-4 sm:px-6 lg:px-8">
    <div
        class="w-full mt-4 max-w-md space-y-14 px-4 py-8 rounded-lg border-2 border-sky-200 hover:border-sky-400 shadow-xl hover:shadow-sky-100">
        <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                alt="Your Company">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Bem vindo de volta</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Não possui uma conta?
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Cadastre-se já</a>
            </p>
        </div>
        <form class="mt-8 space-y-6" action="#" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="-space-y-px rounded-md shadow-sm">
                <div>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500 mb-3 font-medium">Endereço de email</p>
                    {{-- <label for="email-address" class="sr-only">Email address</label> --}}
                    <input id="email-address" name="email" type="email" autocomplete="email" required
                        class="relative block w-full appearance-none rounded-full border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                        placeholder="Endereco de email">
                </div>
            </div>
            <div>
                <p class="mt-1 max-w-2xl text-sm text-gray-500 mb-3 font-medium">Senha</p>
                <input id="password" name="password" type="password" autocomplete="current-password" required
                    class="relative block w-full appearance-none rounded-full border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                    placeholder="Senha">
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900">Lembre-me</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Esqueceu sua senha?</a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <!-- Heroicon name: mini/lock-closed -->
                        <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                                clip-rule="evenodd" />
                        </svg>
                    </span>
                    Entrar
                </button>
            </div>
        </form>
    </div>
</div>
{{-- <main class="position-absolute w-25 top-50 start-50 translate-middle">
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
</main> --}}
