<?php

namespace App\Http\Controllers;

use App\Models\SelectChoice;
use Illuminate\Http\Request;

class SelectChoiceController extends Controller
{

    public function index()
    {
        $choices = SelectChoice::orderBy('created_at', 'desc')->paginate(5);

        return view('admin.choices.choices', ['choices' => $choices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choiceForm(Request $request)
    {
        if ($request->type === 'Edit'  && $request->has('choice')) {
            $data = SelectChoice::find($request->choice);
        } else {
            $data = null;
        }
        return view('admin.choices.choiceForm', ['type' => $request->type, 'data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'label' => 'required',
            'value' => 'required',
            'type' => 'required',
        ];

        $this->validate($request, $rules);

        $booking = SelectChoice::create($request->input());

        return redirect('/admin/choices')->with('success', 'Select Choice Created Succesfully!');
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SelectChoice $choice)
    {
        $rules = [
            'label' => 'required',
            'value' => 'required',
            'type' => 'required',
        ];

        $this->validate($request, $rules);

        $booking = $choice->update($request->input());

        return redirect('/admin/choices')->with('success', 'Select Choice Updated Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SelectChoice $choice)
    {
        $choice->delete();

        return redirect('/admin/choices')->with('success', 'Select Choice Deleted Succesfully!');
    }
}
