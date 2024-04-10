<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Servers') }}
        </h2>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cloud"></i> Servers</a></li>
            <li class="active">Index</li>
        </ol>
    </x-slot>

    <div class="box mt-4">
        <div class="box-header with-border">
            <h3 class="box-title">Servers</h3>
            <div class="box-tools pull-right flex gap-4">
                <div class="input-group" style="width: 150px;">
                    <input type="search" name="table_search" class="form-control pull-right" placeholder="Search"
                    style="border: 1px solid #ccc">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                    Add New
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Tag</th>
                        <th>Status</th>
                        <th>Last Update</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($servers as $server)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{$server->name}}</td>
                            <td></td>
                            <td><span><a href="#"><i class="fa fa-circle text-{{$server->status === 'connected' ? 'success' : 'danger'}}"></i> {{$server->status}}</a></span></td>
                            <td>{{ $server->last_check?->format('Y-m-d h:i A') }}</td>
                            <td></td>
                        </tr>
                        @php
                            $i++;    
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="box-footer clearfix">
            {{ $servers->links() }}
            {{-- <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
            </ul> --}}
        </div>
    </div>
    @include('server.add_modal')
</x-app-layout>
