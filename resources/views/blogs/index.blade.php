<x-layout title="Index">
  <section class="my-4 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <!-- Search -->
    <form action="" class="my-4">
      <input type="search" name="query" value="{{request('query')}}" class="border border-1 rounded-md p-1" placeholder="Search for blogs">
      <button type="submit" class="mx-2 p-1 px-4 bg-blue-500 border border-1 rounded-md text-white">Search</button>
    </form>
    <!-- Multiple filters -->
    <form action="" class="my-4">
      @if (request('query'))
      <input name="query" type="hidden" value="{{request('query')}}">
      @endif
      <label for="">Category Filter</label>
      <select name="category_id" id="" class="border border-1">
        <option value=""></option>
        @foreach ($categories as $category)
        <option value="{{$category->id}}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
        @endforeach
      </select>
      <label for="">User Filter</label>
      <select name="user_id" id="" class="border border-1">
        <option value=""></option>
        @foreach ($users as $user)
        <option value="{{$user->id}}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
        @endforeach
      </select>
      <button type="submit" class="mx-2 p-1 px-4 bg-blue-500 border border-1 rounded-md text-white">Filter</button>
    </form>
    <!-- Add a blog -->
    <div class="my-4">
      <form action="/post" method="POST">
      @csrf
        <button type="submit" class="px-2 py-1 rounded-md bg-blue-500 text-white">Add a blog</button>
      </form>
    </div>
    <!-- Blogs cards -->
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
  </section>
</x-layout>