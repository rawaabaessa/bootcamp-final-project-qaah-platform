<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Message\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageMail;


class TenantMessageController extends Controller
{
    public function index(){
        $Messages = Message::where('user_id', Auth()->id() )->paginate(3);
        // dd($Messages);
        return view('tenant.messages.index',compact('Messages'));
    }
    public function view($id){
        $record = Message::findOrFail($id);
        return view('tenant.messages.view', compact('record'));
    }
    public function store(Request $request){
        Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => $request->id,
        ]);
        return redirect()->back();
    }
    public function destroy($id){
        $record = Message::findOrFail($id);

        // Delete the record
        $record->delete();

        return redirect()->route('tenant.messages.destroy')->with('success', 'Record deleted successfully');
    }
    public function sendreplay(Request $request){
        Mail::to('fatimabukran@gmail.com')->send(new MessageMail($request->reply));
        return redirect()->route('tenant.messages.index')->with('success', 'تم ارسال الرد بنجاح');
    }
}
