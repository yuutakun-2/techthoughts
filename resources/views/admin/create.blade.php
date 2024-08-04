<x-admin-layout>
    <h1 class="font-bold my-3 text-3xl">Blogs Create</h1>
    <!-- Add photo section here -->
    <form action="/admin/store" method="POST">
        @csrf
        <div>
            <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">Add photo</label>
            <input type="file" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="photo">
            @error('file')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Blog title</label>
            <input type="text" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="title">
            @error('title')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="slug" class="block text-sm font-medium leading-6 text-gray-900">Blog slug</label>
            <input type="text" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" name="slug">
            @error('slug')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Blog body</label>
            <textarea type="paragraph" class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" rows="10" name="body">Hehe</textarea>
            @error('body')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <div>
            <label for="category_id" class="block text-sm font-medium leading-6 text-gray-900">Blog category</label>
            <select name="category_id" id="category_id">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs text-red-500 my-2">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="text-white hover:text-black-600 px-6 py-2 bg-blue-600 rounded-md">Submit</button>
    </form>
</x-admin-layout>