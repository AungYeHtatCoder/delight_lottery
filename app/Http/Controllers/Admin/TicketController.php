<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use App\Models\Admin\Lottery;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $data = $request->all();
       

        $image = $data['files'] ?? null;
        if ($image) {
            $mainFolder = 'lottery_images/' . Str::random(); 
        $filename = $image->getClientOriginalName();
        $path = Storage::putFileAs(
            'public/' . $mainFolder,
            $image,
            $filename,
            [
                'visibility' => 'public',
                'directory_visibility' => 'public'
            ]
        );

        $data['files'] = URL::to(Storage::url($path));
        $data['files_mime'] = $image->getClientMimeType();
        $data['files_size'] = $image->getSize();
        }

        // Create the Lottery record
        $lottery = Ticket::create($data);

        return response()->json(['message' => 'Lottery Ticket Created', 'lottery_id' => $lottery->id], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}