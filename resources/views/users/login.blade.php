<x-layout title="Login">
    <div class="max-w-fit mx-auto my-4 border-2 rounded-lg flex justify-center shadow-lg shadow-cyan-500/50">
        <div class="flex items-center px-10 "><img src="{{ asset('img/Copy of Tech (1920 x 200 px).png') }}" alt="" class=""></div> 
        <div class="bg-gray-500 w-[0.5px] h-auto my-10"></div>
        <div class="p-10">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Login</h2>
            </div>
            <form class="max-w-sm mx-auto my-4" action="" method="POST">
            @csrf
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                <input name="email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="name@gmail.com" required />
                @error ('email')
                <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                <input name="password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required />
                @error ('password')
                <p class="text-red-500 text-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                </div>
                <label for="remember" class="ms-2 text-sm font-medium">Remember me</label>
            </div>
            <div class="text-center">
                <button type="submit" class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
            </form>
            <div class="text-center">
                <span>Not a member? <a href="/register" class="text-blue-500 underline">Register here</a></span>
            </div>
        </div>
    </div>
</x-layout>