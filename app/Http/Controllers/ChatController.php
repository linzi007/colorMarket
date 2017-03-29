<?php

namespace App\Http\Controllers;

use App\Events\SendMsgEvent;
use Illuminate\Http\Request;

/**
 * Class ChatController
 * @package App\Http\Controllers
 */
class ChatController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getChatView()
    {
        return view('chat');
    }


    public function chat(Request $request)
    {
        $message = $request->get('message');
        if ($message) {
            broadcast(new SendMsgEvent($message))->toOthers();

            return response()->json(['result' => 'ok'], 200);
        }

        return response()->json(['result' => 'pls input something...'], 200);
    }
}