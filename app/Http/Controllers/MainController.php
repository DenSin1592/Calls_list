<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('main', compact('contacts'));
    }

    public function toFavorites(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return redirect('/main');
        }

        $user = Auth::user();
        $user->contacts()->attach($request->input('id'));

        return redirect('/main');
    }

    public function favorites()
    {
        $user = Auth::user();
        $contacts = $user->contacts;

        return view('favorites', compact('contacts'));
    }
}
