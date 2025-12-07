<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id)
    {
        $message = Message::find($id);
        return view('admin.messages.show', compact('message'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|min:1|max:5000'
        ], [
            'message.required' => 'Поле сообщение обязательно для заполнения',
            'message.min' => 'Сообщение не может быть пустым',
            'message.max' => 'Сообщение не должно превышать 5000 символов'
        ]);

        $message = Message::find($id);
        $message->update(['message' => $request->message]);

        return redirect()->route('admin.messages.show', $id)
            ->with('success', 'Сообщение обновлено');
    }

    public function delete($id)
    {
        Message::destroy($id);
        return redirect()->route('admin.messages.index')
            ->with('deleted', 'Сообщение удалено');
    }
}
