<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite('resources/css/app.css')
</head>

<body class="flex items-center justify-center w-full h-screen bg-[#98DED9]">
    <div class="login-section w-3/12 bg-[#041628] text-red-300 px-8 py-24 flex flex-col gap-10 rounded-xl">
        <h1 class="text-white text-center font-semibold text-xl">Welcome Admin</h1>

        <form action={{ route('login') }} method="POST" class="flex flex-col gap-2">
            @csrf
            <div class="input-area">
                <input id="email" name="email" type="email" autofocus class="w-full py-2 text-center px-3 rounded-md bg-[#041628] border border-blue-500 text-white" placeholder="Enter your email" required> <br> <br>
            </div>
            <div class="input-area">
                <input id="password" name="password" type="password" class="w-full py-2 text-center px-3 rounded-md bg-[#041628] border border-blue-500 text-white" placeholder="Enter your password" required> <br> <br>
            </div>
            <button class="w-full py-3 rounded-md text-white border-white border-2 hover:bg-blue-900 font-semibold">Submit</button>

            @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </form>
    </div>
</body>
</html>
