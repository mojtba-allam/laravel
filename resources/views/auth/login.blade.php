<x-layout>
    <x-slot:heading>
        Log In
    </x-slot:heading>

    <form method="POST" action="/login" class="mt-10 max-w-md mx-auto">
        @csrf

        <x-form.field>
            <x-form.label for="email">Email</x-form.label>
            <x-form.input type="email" name="email" id="email" :value="old('email')" required />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </x-form.field>

        <x-form.field>
            <x-form.label for="password">Password</x-form.label>
            <x-form.input type="password" name="password" id="password" required />
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </x-form.field>

        <div class=" pt-4 flex items-center justify-end gap-x-6">
            <a href="/jobs" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

            <x-form.button>Log In</x-form.button>
        </div>
    </form>

</x-layout>
