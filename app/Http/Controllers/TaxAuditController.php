<?php

namespace App\Http\Controllers;

use App\Models\TaxAudit;
use App\Models\TaxPayer;
use App\Traits\QueryTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaxAuditController extends Controller
{
    use QueryTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['taxPayers'] = TaxPayer::where('status', 1)->get();

        $query = TaxAudit::where('status', 1);
        $query = $this->whereQueryFilter($request, $query, ['invoice_no', 'register_no', 'fiscal_year']);
        $query = $this->filterWhereHasRelation($query, $request,'taxPayer','tin_no');

        $data['taxAudits'] = $query->with('taxPayer')->paginate(20);

        return view('tax-audit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tax_payer_id'      => 'required|integer',
            'fiscal_year'       => 'required',
            'tax_amount'            => 'required',
            'tax_amount_in_sentence' => 'required',
            'invoice_no'        => 'required',
            'register_no'       => 'required',
        ]);

        try{
            TaxAudit::create([
                'tax_payer_id' => $request->tax_payer_id,
                'fiscal_year' => $request->fiscal_year,
                'tax_amount' => $request->tax_amount,
                'tax_amount_in_sentence' => $request->tax_amount_in_sentence,
                'pay_date' => Carbon::parse($request->pay_date)->format('Y-m-d'),
                'invoice_no' => $request->invoice_no,
                'register_no' => $request->register_no,
                'status' => 1
            ]);

            flash()->success('অভিনন্দন! করদাতার চালান সফলভাবে সনযুক্ত হয়েছে');
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tax_amount'            => 'required',
            'tax_amount_in_sentence' => 'required',
            'invoice_no'        => 'required',
            'register_no'       => 'required',
        ]);

        try{
            TaxAudit::update([
                'tax_amount' => $request->tax_amount,
                'tax_amount_in_sentence' => $request->tax_amount_in_sentence,
                'pay_date' => Carbon::parse($request->pay_date)->format('Y-m-d'),
                'invoice_no' => $request->invoice_no,
                'register_no' => $request->register_no,
                'status' => 1
            ]);

            flash()->success('অভিনন্দন! করদাতার চালান সফলভাবে পরিমার্জিত হয়েছে');
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
    public function destroy($id)
    {
        TaxAudit::findOrFail($id)->delete();

        flash()->success('করদাতার চালান ডিলেট হয়েছে');
        return redirect()->back();
    }
}