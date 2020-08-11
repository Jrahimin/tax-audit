<?php

namespace App\Http\Controllers;

use App\Models\TaxPayer;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaxPayerController extends Controller
{
    use QueryTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = TaxPayer::query();
        $query = $this->whereQueryFilter($request, $query, ['tin_no']);
        $query = $this->likeQueryFilter($request, $query, ['name']);

        $data['taxPayers'] = $query->paginate(20);

        return view('tax-payer.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tax-payer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->generateValidationArray());

        try{
            TaxPayer::create($request->all());

            flash()->success('অভিনন্দন! নতুন করদাতা যুক্ত হয়েছে।');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage().'-'.$e->getLine().'-'.$e->getFile());

            return redirect()->back()->withErrors("Something went wrong. Please try again.");
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaxPayer $taxPayer)
    {
        $this->validate($request, $this->generateValidationArray());

        try{
            $taxPayer->update($request->all());

            flash()->success('অভিনন্দন! করদাতার তথ্য সফলভাবে পরিমার্জিত হয়েছে');
            return redirect()->back();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage().'-'.$e->getLine().'-'.$e->getFile());

            return redirect()->back()->withErrors("Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaxPayer $taxPayer)
    {
        $taxPayer->delete();
        flash()->success('করদাতা ডিলেট হয়েছে');

        return redirect()->back();
    }

    protected function generateValidationArray()
    {
        return array(
            'name'    => 'required',
            'tin_no'  => 'required',
            'address' => 'required'
        );
    }
}
