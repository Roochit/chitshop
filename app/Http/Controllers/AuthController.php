<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MemberModel;
use Illuminate\Pagination\Paginator;
// use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login()
    {
        try {
            return view('auth.login');
        } catch (\Exception $e) {
        // \Log::error('Admin list error: '.$e->getMessage());
            return view('errors.404');
        }
    }
    


} //class
