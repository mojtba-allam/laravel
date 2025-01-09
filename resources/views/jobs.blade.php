<x-layout>
    <x-slot:heading class="ml-10 flex items-baseline space-x-4">
    <div class="flex items-center justify-between w-full">
        <div>Job listings</div>
        <a href="/create"
            class="rounded-md bg-green-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 ml-auto">
            Create a job
        </a>
    </div>
</x-slot:heading>


    <div class="space-y-5">
        @foreach ($jobs as $job )

    <a href="/jobs/{{$job['id']}}" class="block px-5 py-5 border border-gray-200 rounded-lg" >
        <div class="font-bold text-blue-500 text-sm">{{$job->employer->name}}</div>
        <div>
            <strong>{{$job['title']}}:</strong>  Pays {{$job['salary'] }} per month.
        </div>

    </a>

        @endforeach

        </div>
        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>
