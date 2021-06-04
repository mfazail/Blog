<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function contact(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $description = $request->input('description');

        $contact = Contact::create([
            'name' => $name,
            'email' => $email,
            'description' => $description
        ]);
        $res = $contact->save();
        if ($res) {
            return back()->with('contact', 'Successfully Submitted');
        } else {
            return back()->withInput([$name, $email, $description]);
        }
    }
    public function newPost()
    {
        $categories = Category::all();
        return view('admin.new-post', compact('categories'));
    }
}
