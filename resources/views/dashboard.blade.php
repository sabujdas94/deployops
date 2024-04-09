<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </x-slot>

    <div class="box mt-4">
        <div class="box-header with-border">
            <h3 class="box-title">Servers</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    Add New
                </button>
            </div>
        </div>
        <div class="box-body" style="">
            {{ __("You're logged in!") }}
        </div>
    </div>
    @include('server.add_modal')
</x-app-layout>
