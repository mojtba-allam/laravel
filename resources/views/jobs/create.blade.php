<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base/7 font-semibold text-gray-900">New Job</h2>
                <p class="mt-1 text-sm/6 text-gray-600">Write what you want.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <x-form-label for="title" >Title</x-form-label>

                    <div class="mt-2">
                        <x-form-input  name="title" id="title" placeholder="CEO" required/>

                            <x-form-error name="title"/>
                        </div>
                    </div>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                            <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div
                                    class="flex items-center px-5 rounded-md bg-white pl-3 outline outline-1 -outline-offset-1 outline-gray-300 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                                </div>
                                    <input type="text" name="salary" id="salary"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        placeholder="$10.000" required>
                                </div>
                                @error('salary')
                                        <p class="mt-1 text-xs text-red-500 font-semibold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="/jobs" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>

                <x-form-button>Save</x-form-button>
            </div>
    </form>

</x-layout>
