<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            'Surya Insomnia',
            'Budi Cadera',
            'Citra wati',
            'Dewi Rahmat',
            'Eko In'
        ];

        return view('members.index', compact('members'));
    }
}