<?php

namespace App\Http\Controllers;

use App\Models\Dataspasial;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Yajra\DataTables\Facades\DataTables;


class PetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
        $query = Dataspasial::orderBy('id', 'desc')->get();
        return DataTables::of($query)
        ->addColumn('aksi', function($item) {
            return '
                <div class="aksi d-flex align-items-center">
                    <div class="aksi-edit px-1">
                        <a class="btn btn-success edit" href="'. route('peta.edit', $item->id) .'">
                            edit
                        </a>
                    </div>
                    <div class="aksi-hapus">
                        <form class="inline-block" action="'. route('peta.destroy', $item->id) .'" method="POST">
                            <button class="btn btn-danger">
                                hapus
                            </button>
                                '. method_field('delete') . csrf_field() .'
                        </form>
                    </div>
                </div>
            ';

        })
        ->rawColumns(['aksi'])
            ->make();
        }

        $items = Dataspasial::all();
        return view('peta.index',[
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Dataspasial::create($data);

        return redirect()->route('peta.index');
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
        $item = Dataspasial::findOrFail($id);

        return view('peta.edit', [
            'item'=>$item
        ]);
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
        $data = $request->all();
        $item = Dataspasial::findOrFail($id);

        $item->update($data);

        return redirect()->route('peta.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Dataspasial::findOrFail($id);
        $data->delete();

        return redirect()->route('peta.index');
    }
}
