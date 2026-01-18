<?php

namespace App\Http\Controllers\Admin;

use App\DTO\MessageDeletedEventDTO;
use App\Events\MessageDeleted;
use App\Http\Controllers\Controller;
use App\Services\MessagesService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class MessagesController extends Controller
{
    use AuthorizesRequests;
    public function index(MessagesService $messagesService)
    {
        $messages = $messagesService->getAllPaginated(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function show($id, MessagesService $messagesService)
    {
        $message = $messagesService->getByID($id);
        return view('admin.messages.show', compact('message'));
    }

    public function update($id, Request $request, MessagesService $messagesService)
    {
        $messagesService->updateValidate($request);
        $message = $messagesService->getByID($id);
        $message->update(['message' => $request->message]);

        return redirect()->route('admin.messages.show', $id)
            ->with('success', 'Сообщение обновлено');
    }

    public function delete($id, MessagesService $messagesService)
    {
        $message = $messagesService->getByID($id);
        $this->authorize('delete', $message);
        $messagesService->delete($message);
        event(new MessageDeleted(MessageDeletedEventDTO::fromModels($message, auth()->user())));
        return redirect()->route('admin.messages.index')
            ->with('deleted', 'Сообщение удалено');
    }
}
