@props(['name'])
<x-form.input-wrapper>
    <x-form.label :name="$name" />
    <textarea name="{{ $name }}" id="egBody" cols="30" rows="10" class="form-control editor">{{ old($name) }}</textarea>
    <x-error name="{{ $name }}"></x-error>
</x-form.input-wrapper>