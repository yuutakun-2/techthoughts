
<x-layout title="View Blade">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <h1 class="font-bold text-3xl ">{{$blog->title}}</h1>
    <p class="my-4 "> {{$blog->body}}</p>
    <p>Category - {{$blog->category->name}}</p>
    <p>User - {{$blog->user->name}}</p>
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
      </div>
    </div>
    @endforeach
    {{$comments->links()}}
   </div>
</x-layout>
