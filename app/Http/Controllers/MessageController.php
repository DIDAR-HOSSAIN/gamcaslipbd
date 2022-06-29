<?php

namespace App\Http\Controllers;
use DB;
use App\Message;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:message-list|message-show', ['only' => ['index', 'show']]);
//        $this->middleware('permission:message-create', ['only' => ['create','store']]);
        $this->middleware('permission:message-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:message-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::orderby('id', 'desc')->paginate(15);
        return view('dashboard.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formType = 'create';
        return view('dashboard.messages.create', compact('formType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            Message::create($data);

            return redirect()->route('messages.create')->with('message', "Message Send Successfully");
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        return view('dashboard.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $formType = 'edit';
        return view('dashboard.messages.create', compact('formType', 'message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $data = $request->all();
        $message->update($data);
        return redirect()->route('messages.index')->with('message', "Message Updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('Delete_message', "Message Deleted Successfully");
    }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $messages = DB::table('messages')->orderBy('id', 'desc')->where('mob_no', 'like', '%' . $search . '%')->paginate(15);

        return view('dashboard.messages.index', ['messages' => $messages]);

    }


}
