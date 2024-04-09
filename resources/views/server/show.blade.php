<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <ol class="breadcrumb">
            <li><a href="{{ route('servers.index') }}"><i class="fa fa-cloud"></i> Servers</a></li>
            <li class="active">{{ $server->name }}</li>
        </ol>
    </x-slot>

    <div class="box mt-4">
        <div class="box-header with-border">
            <h3 class="box-title font-bold">{{ $server->name }}</h3>
            <div class="box-tools pull-right">
                <span id="status" class="ml-4"></span>
            </div>
        </div>
        <div class="box-body" style="">
            {{ __("You're logged in!") }}
        </div>
    </div>

    @push('js')
        <script>
            // Make a GET request
            fetch("{{ route('connection-status', $server->id) }}")
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Parse the JSON response
                })
                .then(data => {
                    // Handle the JSON data
                    console.log('Data:', data);

                    $("#status").html(`<a href="#"><i class="fa fa-circle text-success"></i> Online</a>`);
                })
                .catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
        </script>
    @endpush

</x-app-layout>
