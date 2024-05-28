<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookLog;
use App\Models\RentLog;
use App\Models\UserLog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class RentLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->guest() || auth()->user()->role_id !== 1) {


            // ----------------------- query untuk log id
            $logs_id = UserLog::all()->where('user_id', auth()->user()->id);

            $log_user = [];

            foreach ($logs_id as $log) {
                $log_user[] = $log['rent_log_id'];
            }

            return view('rentLogs', [
                'logs' => RentLog::latest()->whereIn('id', $log_user)->get()
            ]);
        }

        return view('dashboard.rentLogs.index', [
            'logs' => RentLog::with(['books', 'users'])->latest()->get()
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
        $book = Book::all()->where('id', $request['book']);

        if ($book[$request['book'] - 1]['stock'] == 0) {
            return redirect('/books/' . $request['book'])->with('failed', 'Stock not available');
        }

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



        $bookData = [
            'stock' => $book[$request['book'] - 1]['stock'] - 1,
            'book_code' => $book[$request['book'] - 1]['book_code'],
            'title' => $book[$request['book'] - 1]['title'],
            'author' => $book[$request['book'] - 1]['author'],
            'status' => $book[$request['book'] - 1]['status'],
        ];

        Book::where('id', $request['book'])
            ->update($bookData);


        return redirect('/books');
    }

    /**
     * Display the specified resource.
     */
    public function show(RentLog $rentLog)
    {
        // ----------------------- query untuk log id
        // $logs = UserLog::all()->where('user_id', auth()->user()->id);

        // $logs_id = [];

        // foreach ($logs as $log) {
        //     $logs_id[] = $log['rent_log_id'];
        // }

        // // ------------------------ query untuk book id 
        // $books_log = BookLog::all()->whereIn('rent_log_id', $logs_id);

        // $books_id = [];

        // foreach ($books_log as $book) {
        //     $books_id[] = $book['book_id'];
        // }

        // // -------- All Book

        // $books = Book::all()->whereIn('id', $books_id);



        // return view('rentLog', [
        //     // 'logs' => RentLog::all(),
        //     // 'books_id' => $books_id,
        //     // 'books' => $books
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RentLog $rentLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RentLog $rentLog)
    {
        // dd($rentLog['actual_return_date']);
        // $data = $rentLog;
        // $data['actual_return_date'] = now();


        $book = Book::all()->where('id', $request['book_id']);


        $bookData = [
            'stock' => $book[$request['book_id'] - 1]['stock'] + 1,
            'book_code' => $book[$request['book_id'] - 1]['book_code'],
            'title' => $book[$request['book_id'] - 1]['title'],
            'author' => $book[$request['book_id'] - 1]['author'],
            'status' => $book[$request['book_id'] - 1]['status'],
        ];

        Book::where('id', $request['book_id'])
            ->update($bookData);

        $rentLog->actual_return_date = now();
        $rentLog->save();
        // RentLog::where('id', $rentLog)
        //     ->update($data);

        return redirect('/dashboard/rentLogs')->with('success', 'Success update Rent Logs!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RentLog $rentLog)
    {
        //
    }
}
