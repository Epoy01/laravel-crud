<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $msg=null;
        if(isset($_GET['search'])){
            $query=request('search_text');
            $customers['data'] = customer::where('fname', 'LIKE', '%' . $query . '%')
            ->orwhere('mname', 'LIKE', '%' . $query . '%')
            ->orwhere('lname', 'LIKE', '%' . $query . '%')
            ->paginate(5);;
        }else{
            $customers['data'] = customer::paginate(5);
        }
        if($customers['data']->count()>0){
            $customers['msg']=null;
        }else{
            $customers['msg']="No Records Found!";
        }

        return view('cms.index', compact('customers'));
        

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
        'fname'=>'required',
        'mname'=> 'required',
        'lname' => 'required'
        ]);

        $customer = new customer([
        'fname' => $request->get('fname'),
        'mname'=> $request->get('mname'),
        'lname'=> $request->get('lname')
        ]);

        $customer->save();
        return redirect('/cms')->with('success', 'CMS Record has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = customer::find($id);

        return view('cms.edit', compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'fname'=>'required',
        'mname'=> 'required',
        'lname' => 'required'
        ]);

        $customer = customer::find($id);
        $customer->fname = $request->get('fname');
        $customer->mname = $request->get('mname');
        $customer->lname = $request->get('lname');
        $customer->save();

      return redirect('/cms')->with('success', 'Record has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = customer::find($id);
        $customer->delete();

        return redirect('/cms')->with('success', 'Record has been deleted Successfully');

    }
}
