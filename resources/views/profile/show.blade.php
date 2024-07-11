<x-layout title="Show Blade">
    <h1>Welcome from Show Blade File.</h1>

    <h2>User - {{auth()->user()->name}}</h2>
    <h2>Email - {{auth()->user()->email}}</h2>
    <h2>Username - {{auth()->user()->username}}</h2>
    <h2>Time of account made - {{auth()->user()->created_at}}</h2>

</x-layout>