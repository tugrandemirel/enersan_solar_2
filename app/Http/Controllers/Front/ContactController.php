<?php

namespace App\Http\Controllers\Front;

use App\Helpers\Response\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Contact\ContactStoreRequest;
use App\Models\CustomerContact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    private const PATH = "front.contact.";
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view(self::PATH."index");
        } catch (\Exception $exception) {
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactStoreRequest $request)
    {
        $attributes = collect($request->validated());
        try {

            $customer_contact = new CustomerContact();
            $customer_contact->uuid = Str::uuid();
            $customer_contact->name = $attributes->get("name");
            $customer_contact->email = $attributes->get("email");
            $customer_contact->phone = $attributes->get("phone");
            $customer_contact->content = $attributes->get("content");
            $customer_contact->save();

            return ResponseHelper::success("Mesajınız başarıyla gönderildi. En kısa sürede sizinle iletişime geçeceğiz.", 200);
        } catch (\Exception $exception) {
            return ResponseHelper::error("Bir hata ile karşılaşıldı. Lütfen daha sonra tekrar deneyin.", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
