<x-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div>
                    <div>Author - <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a></div>
                    <a href="/categories/{{ $blog->category->slug }}">
                        <div class="badge bg-primary">{{ $blog->category->name }}</div>
                    </a>
                    <div class="text-secondary">{{ $blog->created_at->diffForHumans() }}</div>
                    @auth
                        <form action="/blogs/{{ $blog->slug }}/subscription" method="post">
                            @csrf
                            @if (auth()->user()->isSubscribed($blog))
                                <button class="btn btn-danger">Unsubscribe</button>
                            @else
                                <button class="btn btn-warning">Subscribe</button>
                            @endif
                        </form>
                    @endauth
                </div>
                <p class="lh-md mt-3">
                    {!! $blog->body !!}
                </p>
            </div>
        </div>
    </div>


    <x-comment-form :blog="$blog"></x-comment-form>

    <x-comments :comments="$blog
        ->comments()
        ->latest()
        ->paginate(3)" />

    <x-blog-you-may-like :randomBlogs="$randomBlogs" />

</x-layout>
