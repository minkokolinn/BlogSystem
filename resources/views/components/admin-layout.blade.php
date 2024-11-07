<x-layout>
    <x-slot name="title">
        <title>Admin Blog Create</title>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-4">
                <ul class="list-group mt-5">
                    <li class="list-group-item"><a href="/admin/blogs">Dashboard</a></li>
                    <li class="list-group-item"><a href="/admin/blogs/create">Create Blogs</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
