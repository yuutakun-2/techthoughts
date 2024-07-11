<x-layout title="Community">
    <div class="my-4 grid grid-cols-3 gap-4 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        @foreach ($users as $user)
            <div class="p-4 border rounded-md">
                <h1 class="font-bold">Name - {{$user->name}}</h1>
                <p>Username - {{$user->username}}</p>
                <p>Email - {{$user->email}}</p>
            </div>
        @endforeach
    </div>
</x-layout>