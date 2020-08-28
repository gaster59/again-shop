<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Requests\ResponseRequest;
use App\Services\AlertService;

class ContactController extends BaseAdminController
{

    private $__contact;
    private $__alertService;

    public function __construct(Contact $contact, AlertService $alertService)
    {
        $this->contact      = $contact;
        $this->alertService = $alertService;
    }

    public function index()
    {
        $contacts = $this->contact->getBlogsPaginate(config('paginate.back-end'));
        return view('admin.contact.index', [
            'contacts' => $contacts,
        ]);
    }

    public function response($id)
    {
        try {
            $detailContact = $this->contact->getDetailContact($id);
            if (null == $detailContact) {
                $this->alertService->saveSessionDanger("Contact doesn't exists");
                return redirect(route('admin.product.index'));
            }
            return view('admin.contact.response', [
                'contact' => $detailContact,
            ]);
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Contact error');
            \Log::error($ex->getMessage());
        }
    }

    public function responseMessage($id, ResponseRequest $request)
    {
        try {
            $detailContact = $this->contact->getDetailContact($id);
            if (null == $detailContact) {
                $this->alertService->saveSessionDanger("Contact doesn't exists");
                return redirect(route('admin.product.index'));
            }
            $auth = \Auth::guard('admin')->user();
            $detailContact->update([
                'response'   => $request->response,
                'updated_by' => $auth->id,
                'status' => 1
            ]);
            $this->alertService->saveSessionSuccess('Contact responed successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Contact error');
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.contact.index'));
    }

    public function delete($id)
    {
        try {
            $detailContact = $this->contact->getDetailContact($id);
            if (null == $detailContact) {
                $this->alertService->saveSessionDanger("Contact doesn't exists");
                return redirect(route('admin.product.index'));
            }
            $auth = \Auth::guard('admin')->user();
            $detailContact->update([
                'deleted_by' => $auth->id,
            ]);
            $detailContact->delete();
            $this->alertService->saveSessionSuccess('Contact deleted successfully');
        } catch (Exception $ex) {
            $this->alertService->saveSessionDanger('Contact deleted unsuccessfully');
            \Log::error($ex->getMessage());
        }
        return redirect(route('admin.contact.index'));
    }
}
