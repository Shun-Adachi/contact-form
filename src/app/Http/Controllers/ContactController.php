<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;


class ContactController extends Controller
{
    // 問い合わせフォームの表示
    public function index()
    {
        return view('index');
    }

    // 確認ページの表示
    //public function confirm(Request $request)
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);
        //return $contact;
        return view('confirm', compact('contact'));
    }


    // 保存処理、完了ページの表示
    //public function store(Request $request)
    public function store(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);

        Contact::create($contact);
        return view('thanks');
    }


}
