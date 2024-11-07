<x-admin-layout>
    <h1 class="text-center">Blogs Index</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Intro</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->title }}</th>
                    <td>{{ $blog->intro }}</td>
                    <td>
                        <form action="/admin/blogs/{{ $blog->slug }}/delete" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $blogs->links() }}
</x-admin-layout>
