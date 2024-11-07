<x-layout title="View Blade">
  <!-- Create a grid container with two columns -->
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 grid grid-cols-2 gap-8 py-8 my-4 h-[36rem] border border-2 border-gray-500 rounded-xl">
    <!-- Left half: Photo -->
    <!-- Make this column sticky so it doesn't move when scrolling -->
    <div class="sticky top-0 flex flex-col justify-between">
      <div class="max-h-[560px]">
        <!-- Display the blog photo -->
        @if ($blog->photo)
          <img src="/storage{{$blog->photo}}" alt="Blog photo" class="h-full w-full object-contain">
        @endif
      </div>
      <!-- Display the blog category and user -->
      <div class="flex gap-4 my-4">
        <p class="my-2">Category - <span class="px-2 py-1 rounded-md bg-blue-500 text-white">{{$blog->category->name}}</span></p>
        <p class="my-2">User - <span class="px-2 py-1 rounded-md bg-green-500 text-white">{{$blog->user->name}}</span></p>
      </div>
    </div>
    <!-- Right half: Blog content -->
    <!-- Make this column take up the remaining space and allow it to scroll vertically -->
    <div class="overflow-y-auto max-h-[560px] flex flex-col justify-between">
      <!-- Display the blog title -->
      <div class="sticky top-0 bg-white py-2">
        <h1 class="font-bold text-3xl ">{{$blog->title}}</h1>
      </div>
      <!-- Display the blog body -->
      <div class="overflow-y-auto">
        <p class="my-4"> {{$blog->body}}</p>
      </div>
    </div>
  </div>

  <!-- Comment box -->
  <div class="mx-auto max-w-7xl px-2 my-4 sm:px-6 lg:px-8">
    <span class="font-bold text-3xl">Comment</span>
    <!-- Subscribe/Unsubscribe button -->
    <form action="/blogs/{{$blog->slug}}/subscribe" method="POST">
    @csrf
      @if (auth()->user()->isSubscribed($blog))
        <button type="submit" class="block bg-blue-500 border rounded-md px-4 py-2 text-white">Unsubscribe</button>
      @else
        <button type="submit" class="block bg-blue-500 border rounded-md px-4 py-2 text-white">Subscribe</button>
      @endif
    </form>
    <!-- Comment body box -->
    <form action="/blogs/{{$blog->slug}}/comments" method="POST">
      @csrf
      <textarea name="body" id="" class="w-1/2 h-[200px] border-4"></textarea>
      @error('comment')
        <p>{{$message}}</p>
      @enderror
      <button type="submit" class="block bg-blue-500 border rounded-md px-4 py-2 text-white">Submit</button>
    </form>
  </div>
  <!--Comment cards  -->
  <div class="mx-auto max-w-7xl my-4 sm:px-6 lg:px-8">
    @php
      $comments = $blog->comments()->latest()->paginate(3);
    @endphp
    @foreach ($comments as $comment)
    <div class="border border-2 rounded-md p-2">
      <div>
        <span class="font-bold text-3xl">{{$comment->user->name}}</span>
        <span>{{$comment->created_at->diffForHumans()}}</span>
      </div>
      <div>
        <p>{{$comment->body}}</p>
        @if (auth()->user()->can('delete', $comment))
        <form action="/comments/{{$comment->id}}/destroy" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="block bg-red-500 border rounded-md px-4 py-2 text-white">Delete</button>
        </form>
        @endif
      </div>
    </div>
    @endforeach
    {{$comments->links()}}
  </div>
</x-layout>
