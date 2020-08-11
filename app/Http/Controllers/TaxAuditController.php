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
        $this->validate($request, $this->generateValidationArray(true));

        try{
            TaxAudit::create([
                'tax_payer_id' => $request->tax_payer_id,
                'fiscal_year' => $request->fiscal_year,
                'tax_amount' => $request->tax_amount,
                'tax_amount_in_sentence' => $request->tax_amount_in_sentence,
                'pay_date' => Carbon::parse($request->pay_date)->format('Y-m-d'),
                'invoice_no' => $request->invoice_no,
                'register_no' => $request->register_no,
                'cheque_no' => $request->cheque_no,
                'status' => 1,
                'tax_payer_type' => $request->tax_payer_type
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
    public function show(TaxAudit $taxAudit)
    {
        return view('tax-audit.show', compact('taxAudit'));
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
    public function update(Request $request, TaxAudit $taxAudit)
    {
        $this->validate($request, $this->generateValidationArray());

        try{
            $taxAudit->update([
                'tax_amount' => $request->tax_amount,
                'tax_amount_in_sentence' => $request->tax_amount_in_sentence,
                'pay_date' => Carbon::parse($request->pay_date)->format('Y-m-d'),
                'invoice_no' => $request->invoice_no,
                'register_no' => $request->register_no,
                'cheque_no' => $request->cheque_no,
                'status' => 1,
                'tax_payer_type' => $request->tax_payer_type
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
    public function destroy(TaxAudit $taxAudit)
    {
        $taxAudit->delete();
        flash()->success('করদাতার চালান ডিলেট হয়েছে');

        return redirect()->back();
    }

    protected function generateValidationArray($isStore=false)
    {
        $validationList = array(
            'tax_amount_in_sentence' => 'required',
            'tax_amount'     => 'required',
            'invoice_no'     => 'required',
            'register_no'    => 'required',
            'cheque_no'      => 'required',
            'tax_payer_type' => 'required'
        );

        if($isStore)
            $validationList = array_merge($validationList, [
                'tax_payer_id' => 'required|integer',
                'fiscal_year'  => 'required',
            ]);

        return $validationList;
    }
}
