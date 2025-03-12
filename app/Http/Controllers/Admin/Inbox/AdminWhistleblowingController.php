<?php

namespace App\Http\Controllers\Admin\Inbox;

use App\Actions\Utility\InboxAction;
use App\Enums\TopicType;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Models\Utility\Inbox;
use App\Repositories\Utility\InboxRepository;

;
use Illuminate\Http\Request;

class AdminWhistleblowingController extends AdminController
{
    protected $routePath = 'admin.inbox.whistleblowing';
    protected $pageActive = 'inbox';
    protected $subPageActive = 'whistleblowing';
    protected $pageTitle = 'Whistleblowing';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.inbox.whistleblowing.table", [
            'data' => (new InboxRepository())->datatable(TopicType::Whistleblowing)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("admin.pages.inbox.whistleblowing.show", [
            'data' => (new InboxRepository())->findDetail($id),
            'pageTitle' => 'Detail Whistleblowing'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InboxAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.inbox.whistleblowing.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
