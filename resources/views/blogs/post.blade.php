<x-layout>
    <section class="my-4 mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 gap-x-8">
            <div class="flex flex-col justify-center items-center gap-4">
                <h1 class="font-bold text-2xl">Insert your image here</h1>
                <img src="https://upload.wikimedia.org/wikipedia/commons/1/18/Bugatti_Chiron_1.jpg" alt="">
            </div>
            <!-- <form action="/blogs/post" method="POST">
            @csrf -->
                <div class="flex flex-col items-center">
                    <div class="my-2 flex flex-col gap-2 w-full">
                        <label for="title_text" class="font-bold">Title</label>
                        <textarea class="border-2 rounded-md h-8" name="title_text" id=""></textarea>
                    </div>
                    <div class="my-2 flex flex-col gap-2 w-full">
                        <label for="category" class="font-bold">Category</label>
                            <select name="category" id="category" class="rounded-md border-2 p-2">
                                <option value="">Choose your category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="my-2 flex flex-col gap-2 w-full">
                            <label for="body_text" class="font-bold">Body</label>
                            <textarea class="border-2 rounded-md h-48" name="body_text" id="body_text"></textarea>
                        </div>
                        <button class="text-white-500 bg-blue-500 rounded-md w-24 p-2">Submit</button>
                    </div>
                </div>
            <!-- </form> -->
    </section>
</x-layout>