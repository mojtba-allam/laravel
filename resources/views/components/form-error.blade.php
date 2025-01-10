@props(['name'])
@error($name)
    <p class="mt-1 text-xs text-red-500 font-semibold">{{ $message }}</p>
@enderror
