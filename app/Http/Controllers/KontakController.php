<?php

namespace App\Http\Controllers;

use App\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getContact = Kontak::where('id', Auth::user()->id)->first();

        return view('kontak.index', ['kotak' => $getContact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.form');
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
            'name' => 'required',
            'phone' => 'required|unique:kontaks'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = 'Input Failure';
            $response['data'] = $validator->getMessageBag()->toArray();
            return $response;
        }

        $kontak = new Kontak;
        $kontak->name = $request->input('name');
        $kontak->phone = $request->input('phone');
        $kontak->user_id = Auth::user()->id;

        $kontak->save();

        $message = "Kontak berhasil di input";
        return redirect()->route('kontak.index')->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = Kontak::where('id', $id)->first();

        return view('kontak.form', ['kontak' => $kontak]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.form', ['kontak' => $kontak]);
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
        $rules = [
            'name' => 'required',
            'phone' => 'required|unique:kontaks,' . $id,
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $response['status'] = false;
            $response['message'] = 'Input Failure';
            $response['data'] = $validator->getMessageBag()->toArray();
            return $response;
        }

        $kontak = Kontak::findOrFail($id);;
        $kontak->name = $request->input('name');
        $kontak->phone = $request->input('phone');
        $kontak->user_id = Auth::user()->id;

        $kontak->save();

        $message = "Kontak berhasil di edit";
        return redirect()->route('kontak.index')->withSuccess($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kontak = Kontak::find($id);
        $kontak->delete();

        if ($kontak) {
            return redirect()->route('kontak.index')->withSuccess('Berhasil hapus');
        } else {

            return redirect()->route('kontak.index')->withErrors('Gagal Hapus');
        }
    }
}
