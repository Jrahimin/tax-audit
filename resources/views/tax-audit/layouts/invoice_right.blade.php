<div class="mt-5">
    <div class="row">
        <div class="col-md-5 tiny2">মেসার্স/জনাব/বেগম</div>
        <div class="col-md-7">{{ $taxAudit->taxPayer->name }}</div>
    </div>

    <div class="tiny2">
        <p>টিআইএনঃ {{ $taxAudit->taxPayer->tin_no }}</p>
        <p>ঠিকানাঃ {{ $taxAudit->taxPayer->address }} <span class="ml-5">.....................................এর</span></p>
        <p>নিকট হইতে {{ $taxAudit->fiscal_year }} কর বৎসরের জন্য আয়কর অধ্যাদেশ, ১৯৮৪ এর ৬৪/৭৪(১) ধারায় অগ্রিম/দাবী আদায় বাবদ/সম্পদ কর আইন, ১৯৬৩ এর অধীন সম্পদ কর বাবদ</p>
        টাকা (অংক ও কোথায়) টাকা {{ $taxAudit->tax_amount }}/- বুঝিয়া পাইলাম
    </div>

</div>

<br/>
<div class="row tiny2 mt-5">
    <div class="col-md-7">
        তারিখঃ ...............................................
    </div>

    <div class="col-md-5">
        ...............................................
        <p>ব্যবস্থাপক (ব্যাংকের সিল)</p>
    </div>
</div>
