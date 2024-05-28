<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLog;
use App\Models\RentLog;
use App\Models\UserLog;
use Illuminate\Http\Request;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.rentLogs.index', [
            'logs' => RentLog::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rentlog['rent_date'] = now();
        $rentlog['return_date'] = now()->addDays(3);

        RentLog::create($rentlog);

        $rentlogID = RentLog::latest()->get();

        $bookLog['rent_log_id'] = $rentlogID[0]->id;
        $bookLog['book_id'] = $request['book'];

        BookLog::create($bookLog);


        $userLog['rent_log_id'] = $rentlogID[0]->id;
        $userLog['user_id'] = $request['user'];

        UserLog::create($userLog);



        return redirect('/dashboard/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(RentLog $rentlog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentLog $rentlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RentLog $rentlog)
    {
        dd($rentlog);
        // $user->status = 'active';
        // $user->save();

        // return redirect('/dashboard/users')->with('success', 'User has been active!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}