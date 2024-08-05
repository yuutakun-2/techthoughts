<x-admin-layout>
    <h1 class="font-bold text-2xl py-5">Blogs list</h1>
    <!-- component -->
    <table class="border-collapse my-4">
        <thead>
            <tr>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">User</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Blog</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Category</th>
                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                    {{$blog->user->name}}
                </td>
                <td class="lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    {{$blog->slug}}
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                    <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">{{$blog->category->name}}</span>
                </td>
                <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                    <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                    <a href="/admin/blogs/{{$blog->id}}/edit" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                    <form action="/admin/blogs/{{$blog->id}}/destroy">
                        <button type="submit" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$blogs->links()}}
</x-admin-layout>