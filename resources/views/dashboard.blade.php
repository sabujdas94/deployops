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

    <script>!function(e,t,n,o,p,i,a){e[o]||((p=e[o]=function(){p.process?p.process.apply(p,arguments):p.queue.push(arguments)}).queue=[],p.t=+new Date,(i=t.createElement(n)).async=1,i.src="https://growaffiliate-back-end.test/openpixel.js?t="+864e5*Math.ceil(new Date/864e5),(a=t.getElementsByTagName(n)[0]).parentNode.insertBefore(i,a))}(window,document,"script","opix"),opix("init","a03be966-f7e3-4e38-a82f-94e59a738e1c"),opix("event","pageload");opix('event', 'signup', {email: "{{\Auth::user()->email}}"})</script>
</x-app-layout>
