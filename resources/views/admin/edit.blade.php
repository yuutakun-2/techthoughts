<x-admin-layout>
    <h1 class="font-bold my-3 text-3xl">Blogs Edit</h1>
    <form action="/admin/blogs/{{$blog->id}}/edit" method="POST" enctype="multipart/form-data">
        @if ($blog->photo)
            <img src="/storage{{$blog->photo}}" alt="Blog photo" class="h-[200px] w-fit place-self-center">
        @endif
        @csrf
        <div>
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Add photo</label>
            <input type="file" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="photo" id="photo">
            @error('photo')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Blog title</label>
            <input type="text" id="title"  value="{{old('title', $blog->title)}}" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="title">
            @error('title')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Blog slug</label>
            <input type="text" value="{{old('slud', $blog->slug)}}" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="slug">
            @error('slug')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Blog body</label>
            <textarea type="paragraph" value="{{old('body', $blog->body)}}" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" rows="10" name="body">Hehe</textarea>
            @error('body')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Blog category</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category) 
                <option {{old('category_id', $blog->category_id) == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="text-white hover:text-black-600 px-6 py-2 bg-blue-600 rounded-md">Submit</button>
    </form>
</x-admin-layout>