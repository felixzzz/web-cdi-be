<?php

namespace App\Actions\Utility;

use App\Http\Requests\Utility\InboxRequest;
use Illuminate\Http\Request;
use App\Models\Utility\Inbox;

class InboxAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function handle(InboxRequest $request, $type)
    {
        Inbox::create([
            'type' => $type,
            ...$request->only(['first_name', 'last_name', 'country_id', 'topic_id', 'message', 'email'])
        ]);
    }

    public function delete($ulid){
        return Inbox::where('ulid', $ulid)->delete();
    }
}
