<div class="text-center">
    <h5>সার্কেল-১ (কোম্পানি)</h5>
    <small>কর অঞ্চল-১, চট্টগ্রাম। <span class="ml-5">আইটি-৩১ সংশোধিত</span></small>
    <div>
        <small>........................সার্কেল............................কর অঞ্চল.............................।</small>
    </div>

    <div class="mt-3">
        <p>{{ $taxAudit->tax_payer_type }}</p>
        <p>....................................<span class="tiny">তারিখ অথবা ততপূর্বে দেয়া</span> <span class="tiny ml-4">মূলকপি (কর কর্মকর্তার অফিসে দিতে হইবে)</span></p>

    </div>

    <div class="row">
        <div class="col-md-6 tiny2">
            {{ $taxAudit->tax_payer_type }}
        </div>

        <div class="col-md-6 tiny2">
            <p>৬৪/৭ (১) ধারায় অগ্রিম</p>
            <p>উৎসে কর্তন</p>
            <p>দাবী আদায়</p>
            <p>বকেয়া কর</p>
        </div>
    </div>

    <div class="row tiny2">
        <div class="col-md-5">চট্টগ্রাম বাংলাদেশ ব্যাংক/সোনালী ব্যাংক শাখায়</div>
        <div class="col-md-2">{{ $taxAudit->fiscal_year }}</div>
        <div class="col-md-5">কর বৎসরের জন্য প্রদেয় করের চালান</div>
    </div>

    <table class="table table-bordered mt-1">
        <thead>
        <tr class="tiny2">
            <td>*(লেজার ফোলিও নং এবং) টিআইএন</td>
            <td>করদাতার নাম ও ঠিকানা</td>
            <td>করের পরিমাণ (অংক ও কথায়)</td>
        </tr>
        </thead>
        <tbody>
        <tr class="tiny2">
            <td>১</td>
            <td>২</td>
            <td>৩</td>
        </tr>

        <tr class="tiny3">
            <td>{{ $taxAudit->taxPayer->tin_no }}</td>
            <td>{{ $taxAudit->taxPayer->name }} <p class="mt-3">{{ $taxAudit->taxPayer->address }}</p></td>
            <td>টাকা {{ $taxAudit->tax_amount }}/- <p>({{ $taxAudit->tax_amount_in_sentence }})</p></td>
        </tr>

        <tr class="tiny2">
            <td colspan="2">
                তারিখ <span class="dotted">{{ $taxAudit->pay_date }}</span>
                <p class="mt-2">গ্রহণ করুন ও রশিদ দিন</p>

                <div class="row mt-5">
                    <div class="col-md-5">
                        <p class="mb-1">....................................</p>
                        আয়কর কেরানির স্বাক্ষর
                    </div>
                    <div class="col-md-7">
                        <p class="mb-1">.............................................</p>
                        <p class="mb-0">অর্থ জমাকারী/ডেপুটি কমিশনার</p>
                        <p class="mb-0">অব ট্যাক্সেস এর স্বাক্ষর (৩ সিল)</p>
                        <p class="mb-0">সার্কেল-১ (কোম্পানীজ)</p>
                        <p class="mb-0">কর অঞ্চল-১, চট্টগ্রাম।</p>
                    </div>
                </div>
            </td>
            <td>
                <p>১ । চালান নং <span class="dotted">{{ $taxAudit->invoice_no }}</span></p>
                <p>২ । আদায় রেজিস্টারভুক্তির নং <span class="dotted">{{ $taxAudit->register_no }}</span></p>
                <p>তারিখ <span class="dotted">{{ $taxAudit->pay_date }}</span></p>

                <div class="mt-4">
                    ...............................................
                    <p>ব্যবস্থাপক (ব্যাংকের সিল)</p>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
</div>
