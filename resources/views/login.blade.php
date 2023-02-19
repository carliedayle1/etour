<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Tour</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Styles -->
        <script>
            tailwind.config = {
              theme: {
                extend: {
                    fontFamily: {
                    'body': ['Figtree', 'sans'],
                    },
                }
              }
            }
          </script>
</head>
<body class="font-body h-full">
    <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md space-y-8">
          <div>
            <img class="mx-auto h-12 w-auto" src="{{ asset('/images/travel.png') }}" alt="E-Tour">
            <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Login</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
              Not registered yet? 
              <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Register</a>
            </p>
          </div>
          <form class="mt-8 space-y-6" method="POST" action="/authenticate" >
            @csrf
            {{-- <input type="hidden" name="remember" value="true"> --}}
            <div class="-space-y-px rounded-md shadow-sm">
              <div>
                <label for="username" class="sr-only">Username</label>
                <input id="username" name="username" type="text" class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Username" value={{ old('username') }}>
              </div>
              <div>
                <label for="password" class="sr-only">Password</label>
                <input id="password" name="password" type="password" class="relative block w-full appearance-none rounded-none border rounded-b-md border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Password">
              </div>
            </div>
      
            {{-- <div class="flex items-center justify-between">
              <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                <label for="remember-me" class="ml-2 block text-sm text-gray-900">Remember me</label>
              </div>
      
              <div class="text-sm">
                <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
              </div>
            </div> --}}
            @if ($errors->any())
          <div class="bg-red-400 px-2 py-3 rounded">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li class="text-white text-sm py-2">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
      
            <div>
              <button type="submit" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                  <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
                  </svg>
                </span>
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
</body>


</html>