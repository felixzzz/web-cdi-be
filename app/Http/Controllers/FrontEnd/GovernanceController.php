<?php

namespace App\Http\Controllers\FrontEnd;

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Utility\InboxRequest;
use Illuminate\Http\Request;
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
            return back()->with(['error' => $th->getMessage()]);
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
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(), // di production biasanya diganti message generic
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
