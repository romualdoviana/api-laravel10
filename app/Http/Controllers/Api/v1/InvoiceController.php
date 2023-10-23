<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\v1\InvoiceResource;
use App\Models\Invoice;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    use HttpResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return InvoiceResource::collection(Invoice::with("user")->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'user_id'=>'required',
            'type'=>'required|max:1',
            'paid'=>'required|numeric|between:0,1',
            'payment_date'=> 'nullable',
            'value'=>'required|numeric|between:1,9999.99',
        ]);

        if($validator->fails()){
            return $this->error('Data Invalid',422,$validator->errors());
        }

        $created = Invoice::create($validator->validated());
        if(!$created){
            return $this->error('Something wrong',400);
        }
        return $this->response('Invoice created',201,new InvoiceResource($created->load('user')));
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
