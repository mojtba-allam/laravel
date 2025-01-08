<x-layout>
<x-slot:heading>
        Job listings
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

        <div>
            {{$jobs->links()}}
        </div>
    </div>
</x-layout>
