<?php

namespace App\Http\Controllers\FrontEnd;

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\InboxRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
            Log::error('Failed to store contact us message: ' . $th->getMessage(), [
                'exception' => $th,
            ]);

            return back()->with(['error' => __('Failed to submit data. Please try again later.')]);
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
            Log::error('Failed to store contact us message via API: ' . $th->getMessage(), [
                'exception' => $th,
            ]);

            return response()->json([
                'success' => false,
                'message' => __('Failed to submit data. Please try again later.'),
            ], 500);
        }
    }
}
