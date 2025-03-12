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

class AdminContactUsController extends AdminController
{
    protected $routePath = 'admin.inbox.contact-us';
    protected $pageActive = 'inbox';
    protected $subPageActive = 'contact-us';
    protected $pageTitle = 'Contact Us';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.pages.inbox.contact-us.table", [
            'data' => (new InboxRepository())->datatable(TopicType::ContactUs)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view("admin.pages.inbox.contact-us.show", [
            'data' => (new InboxRepository())->findDetail($id),
            'pageTitle' => 'Detail Contact Us'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InboxAction $action, string $id)
    {
        try {
            $action->delete($id);

            return redirect(route('admin.inbox.contact-us.index'))->with(['info' => __("admin.success_delete")]);
        } catch (\Throwable $e) {
            return redirect()->back()->with(['info' =>  $e->getMessage()]);
        }
    }
}
