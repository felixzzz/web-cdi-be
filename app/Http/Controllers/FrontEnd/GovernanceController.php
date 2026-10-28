<?php

namespace App\Http\Controllers\FrontEnd;

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\InboxRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class GovernanceController extends Controller
{
    public function index()
    {
        return Inertia::render("Governance/GovernancePage");
    }

    public function whistleblowing()
    {
        return Inertia::render("GovernanceWhistleblowing/Index");
    }

    public function whistleblowingStore(InboxRequest $request, InboxAction $inboxAction)
    {
        try {
            $inboxAction->handle($request, TopicType::Whistleblowing);
            return back()->with(['success' => __("Data successfully submitted")]);
        } catch (\Throwable $th) {
            Log::error('Failed to store whistleblowing message: ' . $th->getMessage(), [
                'exception' => $th,
            ]);

            return back()->with(['error' => __('Failed to submit data. Please try again later.')]);
        }
    }

    public function apiWhistleblowingStore(InboxRequest $request, InboxAction $inboxAction)
    {
        try {
            $inboxAction->handle($request, TopicType::Whistleblowing);

            return response()->json([
                'success' => true,
                'message' => __('Data successfully submitted'),
            ], 201); // 201 = Created
        } catch (\Throwable $th) {
            Log::error('Failed to store whistleblowing message via API: ' . $th->getMessage(), [
                'exception' => $th,
            ]);

            return response()->json([
                'success' => false,
                'message' => __('Failed to submit data. Please try again later.'),
            ], 500);
        }
    }

    public function type($type)
    {
        return Inertia::render("Governance/GovernanceTypePage", [
            'type' => $type,
            'title' => Helper::getTitleTypeGovernance($type)
        ]);
    }
}
