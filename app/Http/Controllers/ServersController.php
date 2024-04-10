<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServerStoreRequest;
use App\Models\Servers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServersController extends Controller
{
    public function index()
    {
        $servers = Servers::query()
            ->paginate(20);

        return view('server.index', compact('servers'));
    }
    public function store(ServerStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $server = Servers::create($request->safe()->all());
            DB::commit();
            notify()->success(__("New server added successfully"));
            return redirect()->route('servers.show', $server->id);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
    public function show(int $id)
    {
        $server = Servers::firstOrFail($id);
        return view('server.show', compact('server'));
    }

    
}
