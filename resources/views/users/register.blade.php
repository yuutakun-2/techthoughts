<x-layout title="Register">
    <div class="max-w-fit mx-auto my-4 border-2 rounded-lg flex justify-center shadow-lg shadow-cyan-500/50">
        <div class="flex items-center px-10 "><img src="{{ asset('img/logo_banner.png') }}" alt="" class=""></div> 
        <div class="bg-gray-500 w-[0.5px] h-auto my-10"></div>
        <div class="p-10">
            <div class="text-center">
                <h2 class="text-3xl font-bold">Register</h2>
            </div>
            <form class="max-w-sm mx-auto my-4" action="" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium">Name</label>
                <input type="name" name="name" value="{{old('name')}}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required />
                @error ('name')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium">Username</label>
                <input type="username" name="username" value="{{old('username')}}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required />
                @error ('username')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" placeholder="name@gmail.com" required />
                @error ('email')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-sm rounded-lg block w-full p-2.5" required />
                @error ('password')
                <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                <input name="agree" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" required />
                </div>
                <label for="agree" class="ms-2 text-sm font-medium">I agree with Tech Thoughts' terms and conditions. (Required)</label>
            </div>
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                <input name="subscribe" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                </div>
                <label for="subscribe" class="ms-2 text-sm font-medium">I want to subscribe to get post updates in my email.</label>
            </div>
            <div class="text-center">
                <button type="submit" class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>
            </form>
            <div class="text-center">
                <span>Already a member? <a href="/login" class="text-blue-500 underline">Login here</a></span>
            </div>
        </div>
    </div>

</x-layout>