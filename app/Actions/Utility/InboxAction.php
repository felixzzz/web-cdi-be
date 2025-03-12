<?php

namespace App\Actions\Utility;

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
    public function delete($ulid){
        return Inbox::where('ulid', $ulid)->delete();
    }
}
