<?php

namespace App\Http\Controllers\Admin;

use App\Models\LifeMember;
use Illuminate\Http\Request;
use App\Imports\LifeMemberImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class LifeMemberController extends Controller
{
    public function index()
    {
        $members = LifeMember::orderBy('lm_no', 'DESC')->paginate(50);

        return view('admin.members.life_members.index', compact('members'));
    }

    public function importView()
    {
        return view('admin.members.life_members.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new LifeMemberImport, $request->file('file'));

        return redirect()->route('admin.life-members.index')
                         ->with('success', 'Life Members imported successfully!');
    }
}
