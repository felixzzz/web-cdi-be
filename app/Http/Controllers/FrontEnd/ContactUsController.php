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

    public function storeContacUsApi(InboxRequest $request, InboxAction $inboxAction)
    {
        try {
            // Jalankan action seperti biasa
            $inboxAction->handle($request, TopicType::ContactUs);

            return response()->json([
                'success' => true,
                'message' => __('Data successfully submitted'),
            ], 201); // 201 = Created
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(), // di production biasanya diganti message generic
            ], 500);
        }
    }
}
