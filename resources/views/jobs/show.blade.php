<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
    <h1 class="text-2xl font-bold mx-2"> This job:{{ $job->title }} pays {{ $job->salary }}</h1>


    @can('edit-job', $job)
        <p class="mt-6">
            <x-button class="m-2" href="/jobs/{{ $job->id }}/edit"> Edit</x-button>
        </p>
    @endcan


</x-layout>
