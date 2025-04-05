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

    public function type($type)
    {
        return Inertia::render("Governance/GovernanceTypePage", [
            'type' => $type,
            'title' => Helper::getTitleTypeGovernance($type)
        ]);
    }
}
