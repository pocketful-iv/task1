<?php
namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $equipment = $request->get('equipment') != '' ? $request->get('equipment') : -1;
        $field = $request->get('field') != '' ? $request->get('field') : 'name';
        $sort = $request->get('sort') != '' ? $request->get('sort') : 'asc';
        $customers = new Customer();
        if ($equipment != -1)
            $customers = $customers->where('equipment', $equipment);
        $customers = $customers->where('name', 'like', '%' . $search . '%')
            ->orderBy($field, $sort)
            ->paginate(8)
            ->withPath('?search=' . $search . '&equipment=' . $equipment . '&field=' . $field . '&sort=' . $sort);
        return view('orders.index', compact('customers'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('orders.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate($request, $rules);
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->equipment = $request->equipment;
            $customer->email = $request->email;
            $customer->save();
            return redirect()->back()->with('message', 'Jūsų registracija priimta.');
        }
    }

    public function details(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('orders.details', ['customer' => Customer::find($id)]);
    }
}