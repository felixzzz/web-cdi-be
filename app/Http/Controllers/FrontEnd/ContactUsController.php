<?php

namespace App\Http\Controllers\FrontEnd;

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\InboxRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactUsController extends Controller
{
    public function index()
    {
        return Inertia::render("ContactUs/ContactUsPage");
    }

    public function store(InboxRequest $request, InboxAction $inboxAction)
    {
        try {
            $inboxAction->handle($request, TopicType::ContactUs);
            return back()->with(['success' => __("Data successfully submitted")]);
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);
        }
    }
}
