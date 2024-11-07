@props(["b"])
<div class="card">
    <img src='{{ asset("/storage/$b->thumbnail") }}'
        class="card-img-top" alt="..." />
    <div class="card-body">
        <h3 class="card-title">{{ $b->title }}</h3>
        <p class="fs-6 text-secondary">
            <a href="/?username={{ $b->author->username }}">{{ $b->author->name }}</a>
            <span> - {{ $b->created_at->diffForHumans() }}</span>
        </p>
        <div class="tags my-3">
            <a href="/?category={{ $b->category->slug }}"><span class="badge bg-primary">{{ $b->category->name }}</span></a>
        </div>
        <p class="card-text">
            {{ $b->intro }}
        </p>
        <a href="/blogs/{{ $b->slug }}" class="btn btn-primary">Read More</a>
    </div>
</div>
