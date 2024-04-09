<form class="modal fade" id="modal-default" action="{{ route('servers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Server</h4>
            </div>
            <div class="modal-body">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="form-control mt-1 block w-full"
                        :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                <div class="flex gap-2 mt-2 w-full">
                    <div class="w-2/3">
                        <x-input-label for="ip" :value="__('IP')" />
                        <x-text-input id="ip" name="ip" type="text" class="form-control mt-1 block w-full"
                            :value="old('ip')" required autofocus autocomplete="ip" />
                        <x-input-error class="mt-2" :messages="$errors->get('ip')" />
                    </div>
                    <div class="w-1/3">
                        <x-input-label for="port" :value="__('Port')" />
                        <x-text-input id="port" name="port" type="text" class="form-control mt-1 block w-full"
                            :value="old('port')" required autofocus autocomplete="port" />
                        <x-input-error class="mt-2" :messages="$errors->get('port')" />
                    </div>
                </div>
                <div class="mt-2">
                    <x-input-label for="username" :value="__('Username')" />
                    <x-text-input id="username" name="username" type="text" class="form-control mt-1 block w-full"
                        :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('username')" />
                </div>
                <div class="mt-2">
                    <x-input-label for="passkey" :value="__('Pass Key')" />
                    <x-text-input id="passkey" name="passkey" type="password" class="form-control mt-1 block w-full"
                        :value="old('passkey')" required autofocus autocomplete="passkey" />
                    <x-input-error class="mt-2" :messages="$errors->get('passkey')" />
                </div>
                {{-- <div class="mt-2">
                    <x-input-label for="key_type" :value="__('key_type')" />
                    <x-text-input id="key_type" name="key_type" type="text" class="form-control mt-1 block w-full"
                        :value="old('key_type')" required autofocus autocomplete="key_type" />
                    <x-input-error class="mt-2" :messages="$errors->get('key_type')" />
                </div> --}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</form>
