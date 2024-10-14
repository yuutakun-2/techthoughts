<x-layout>
    <div class="w-full">
        <img src="{{ asset('img/logo_bg.png') }}" alt="" class="object-cover h-[660px] w-full mb-4">
        <link rel="stylesheet" href="{{ asset('css/scrolldown.css') }}">
        <span id="logo_text">Reviews. Thoughts. Tips. Just for you.</span>
        <div class="scroll-down"></div>
        <!-- Blogs cards -->
        <h1 class="text-5xl font-bold text-gray-800 text-center my-4">Blogs</h1>
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4">
                @forelse ($blogs as $blog)
                <div class="flex flex-col justify-between py-4 sm:px-6 lg:px-4 border border-1 rounded-md">
                    <div class="flex flex-col">
                    @if ($blog->photo)
                        <img src="/storage{{$blog->photo}}" alt="Blog photo" class="h-[200px] w-fit place-self-center">
                    @endif
                    <h1 class="font-bold text-3xl "><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
                    <p class="my-4 ">{{$blog->body}}</p>
                    </div>
                    <div class="flex flex-col">
                    <p class="my-2">Category - <span class="px-2 py-1 rounded-md bg-blue-500 text-white">{{$blog->category->name}}</span></p>
                    <p class="my-2">User - <span class="px-2 py-1 rounded-md bg-green-500 text-white">{{$blog->user->name}}</span></p>
                    </div>
                </div>
                @empty
                <p>No results.</p>
                @endforelse
            </div>
            {{$blogs->links()}}
        </div>
    </div>
</x-layout>