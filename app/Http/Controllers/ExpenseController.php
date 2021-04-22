<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::paginate(10);
        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('admin.expenses.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|alpha',
            'last_name'     => 'required|alpha',
            'email'         => ['required', 'email', new EmailValidate],
            'user_id'       => 'required',
        ]);

        $data = $request->except('_token');
        $data['role_id'] = Role::USER;
        
        $invite = Invitation::where('email', $request->email)->first();
        if (!$invite){
            $invite = Invitation::create($data);
        }

        $data['link'] = url('user/signup/' . base64_encode($invite->id));
        
        Mail::send('admin.email_templates.invite', $data, function ($message) use ($invite) {
            $message->to($invite->email, $invite->first_name)
                ->subject('Expense Manager - Invitation');
        });
        
        if($invite)
        {
            notify()->success('Invitation sent successfully');
            return redirect()->route('users.index');
        }
    }

    public function show($id)
    {
        $expense = Expense::find(base64_decode($id));
        return view('admin.expenses.show', compact('expense'));
    }

    public function edit($id)
    {
        $expense = Expense::find(base64_decode($id));
        return view('admin.expenses.form', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amount'        => 'required',
            'description'   => 'required',
        ]);
        
        $expense = Expense::find($id);
        $data = $request->except(['_method', '_token', 'expense_id']);
        
        $expense->update($data);

        notify()->success('Expense successfully updated');
        return redirect()->route('expenses.index');
    }
}
