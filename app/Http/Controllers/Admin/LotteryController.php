<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Lottery;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.lottery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.lottery.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
// {
//     $data = $request->all();
//     $data['user_id'] = Auth::user()->id;
//     // Parse start_date and end_date into 'YYYY-MM-DD' format
//     $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
//     $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date'])->format('Y-m-d');
//     $image = $data['files'] ?? null;
//     if ($image) {
//         $mainFolder = 'lottery_images/' . Str::random(); 
//         $filename = $image->getClientOriginalName();
//         $path = Storage::putFileAs(
//             'public/' . $mainFolder,
//             $image,
//             $filename,
//             [
//                 'visibility' => 'public',
//                 'directory_visibility' => 'public'
//             ]
//         );

//         $data['files'] = URL::to(Storage::url($path));
//         $data['files_mime'] = $image->getClientMimeType();
//         $data['files_size'] = $image->getSize();
//     }

//     Lottery::create($data);

//     return redirect('admin.lotteries.index')->with('success', 'Lottery Ticket Created.');
// }

public function store(Request $request)
{
    try {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        // Parse start_date and end_date into 'YYYY-MM-DD' format
        $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date'])->format('Y-m-d');

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
        $lottery = Lottery::create($data);

        return response()->json(['message' => 'Lottery Ticket Created', 'lottery_id' => $lottery->id], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error: ' . $e->getMessage()], 500);
    }
}


public function lotteryStore(Request $request)
{
    try {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        // Parse start_date and end_date into 'YYYY-MM-DD' format
        $data['start_date'] = Carbon::createFromFormat('d/m/Y', $data['start_date'])->format('Y-m-d');
        $data['end_date'] = Carbon::createFromFormat('d/m/Y', $data['end_date'])->format('Y-m-d');

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
        $lottery = Lottery::create($data);

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