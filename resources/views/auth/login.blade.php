<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BacaKomik</title>
    @vite('resources/css/app.css') 
</head>
    <body>
        <div class="flex justify-center items-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md bg-white rounded shadow p-6">
                <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
                <form method="POST" action="{{ url('login') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block mb-1">Email</label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" required autofocus>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1">Password</label>
                        <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Login</button>
                </form>
                <div class="mt-4 text-center">
                    <p>Belum punya akun? 
                        <a href="{{ route('register') }}" class="text-blue-600 hover:underline"> Register</a>
                    </p> 
                </div>
            </div>
        </div>
    </body>
</html>