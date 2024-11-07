@props(['blog'])
<section class="container">
    <div class="col-md-8 mx-auto">
        @auth
            <x-card-wrapper>
                <form action="/blogs/{{ $blog->slug }}/comments" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="body" id="" cols="10" rows="5" class="form-control border border-0"
                            placeholder="Say something">
                        
                        </textarea>
                        <x-error name="body"></x-error>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </x-card-wrapper>
        @else
            <p class="text-center">Please <a href="/login">login</a> first to participate in this discussion.</p>
        @endauth
    </div>
</section>