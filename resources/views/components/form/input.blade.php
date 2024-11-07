@props(['name','type'=>'text'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <input type="{{ $type }}" name="{{ $name }}" class="form-control" value="{{ old($name) }}"
        id="{{ $name }}" aria-describedby="emailHelp">
    <x-error :name="$name"></x-error>
</x-form.input-wrapper>