<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdectRequest;
use App\Model\Prodect;
use Illuminate\Http\Request;
use App\Http\Resources\Prodect\ProdectResource;
use App\Http\Resources\Prodect\ProdectCollection;
use Symfony\Component\HttpFoundation\Response;
use App\Exceptions\ProdectNotBelongsToUser;
use Auth;

class ProdectController extends Controller
{
    /**
     * ProdectController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        return ProdectCollection::collection(Prodect::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdectRequest $request)
    {
        $prodect = new Prodect;

        $prodect->name = $request->name;
        $prodect->details = $request->descrption;
        $prodect->price = $request->price;
        $prodect->stock = $request->stock;
        $prodect->descount = $request->descount;
        $prodect->save();

        return response([
            'data' => new ProdectResource($prodect)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Prodect  $prodect
     * @return \Illuminate\Http\Response
     */
    public function show(Prodect $prodect)
    {
        return new ProdectResource($prodect);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Prodect  $prodect
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodect $prodect)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Prodect  $prodect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodect $prodect)
    {
        $this->ProdectUserCheck($prodect);

        $request['details'] = $request->descrption;
        unset($request['descrption']);

        $prodect->update($request->all());

        return response([
            'data' => new ProdectResource($prodect)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Prodect  $prodect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodect $prodect)
    {

        $this->ProdectUserCheck($prodect);

        $prodect->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }

    public function ProdectUserCheck($prodect)
    {
        if (Auth::id() !== $prodect->user_id ) {
            
            throw new ProdectNotBelongsToUser;
        }
    }

}
