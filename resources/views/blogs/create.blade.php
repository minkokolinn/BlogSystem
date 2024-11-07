<x-admin-layout>
    <x-slot name='title'>
        <title>Admin Create Blog</title>
    </x-slot>
    <h1 class="my-3 text-center">Create Blog Form</h1>
    
        <x-card-wrapper>
            <form action="/admin/blogs/create" method="post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.input name="slug" />
                <x-form.input name="intro" />
                <x-form.textarea name="body" />
                <x-form.input-wrapper>
                    <x-form.label name="category"></x-form.label>
                    <select name="category_id" id="egCategory" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id') ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id"></x-error>
                </x-form.input-wrapper>
                <x-form.input name="thumbnail" type="file" />
                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </x-card-wrapper>
    
</x-admin-layout>
