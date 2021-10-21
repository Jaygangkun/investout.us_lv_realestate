@extends('front_end.parent')
@section('body')
<style>
.nice-select.form-control{
    float: left;
    width: 100%;
    margin-bottom: 15px;
    line-height: 30px;
}
.error{
    font-size: 12px;
    color: red;
}
.card-header{
    background-color: #1B3563;
    color: #fff;
}
.outcomeclass{
    margin-bottom: 20px;
    color: #1B3563;
    padding: 10px;
    text-shadow: 2px 2px 4px #000;
}
.col-form-label b{
    color: #1B3563;
}
.dnone{
    display: none;
}
</style>
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h3>Investor</h3>
                        <div class="breadcrumb-option">
                            <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                            <span>investor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section Begin -->

    <!-- Seller Image Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="{{asset('assets/front_end/img/investor/before.png')}}" alt="image">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-blog-item">
                        <div class="sb-pic">
                            <img src="{{asset('assets/front_end/img/investor/after.png')}}" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section Begin -->
    <div class="video-section set-bg" data-setbg="{{asset('assets/front_end/img/slider.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="video-text">
                        <a href="https://www.youtube.com/watch?v=7xREj5jb0Rg" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        <h4>WE CREATE NEW WORLD SOLUTIONS</h4>
                        <h2>Increase your Investing IQ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Section End -->
    <!-- Seller Image Section End -->
    <!-- Writing Section Begin -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Find More Homes, Make More Money, Get maximum return on your investments.</h2>
                        <p>Invest Out creates options. Whether you Partner or Buy, through our Web Portal you will find homes, primed for investing, Invest Out was conceived with the idea of connecting homeowners with investors to Partner, Renovate, Sell and Share the profits of the renovated home once sold. Many homeowners, however, would prefer to simply sell their homes with a limited commitment of time. We’ve created a marketplace where homeowners and investors can connect and decide – together.</p>
                        <dd> <b>Why should you learn more?</b></dd>
                        <ul style="margin-left:50px">
                            <li> The Invest Out Partnering model compares well with the traditional fix and flip model from a profit standpoint.</li>
                            <li> As an investor, you no longer need to hunt for good properties; they are all listed on the portal.</li> 
                            <li> Lenders are no longer needed to perform the capital intensive purchase because you no longer need to buy the property.</li> 
                            <li> Because there is no purchase, the typical capital intensive closing costs can now be used to rehab the property and shared with the homeowners.</li> 
                            <li> The homeowner no longer feels disrespected or vulnerable, and is open and hopeful of an attractive and sensible proposal.</li> 
                            <li> Amazingly, homeowners will now seek you out to be their Partners instead of you having to do the expensive marketing for leads. This is the acclaimed Pull Marketing strategy which creates customer demand for your services as an investor.</li>    
                            <li> Your marketing, skip tracing, and other costs to find property are all eliminated.</li> 
                            <li> The Invest Out portal virtually eliminates your need and the cost of a Wholesaler or a Property Finder. No Assignment costs or commissions ever again. No waiting on Birddogs who over-promise and under-deliver.</li>
                            <li> By better managing your time and greatly reducing your expenses, the number of homes you Partner in a year and your total profits can both be significantly higher.</li> 
                            <li> What was hard, time-consuming, and costly, Invest Out now makes that easy, efficient, and more profitable - and a lot less stressful.</li> 
                            <li> Invest Out: a great, new way to find, fix, and flip any property.</li> 
                        </ul>
                        <br>
                        <p>Partnering offers tremendous options for investors because you pay only for the renovation costs of the house. This means the money you would have traditionally used to purchase the home can be used to Partner more homes. In this way, you can renovate multiple properties at once which means your house flipping business will scale.</p>
                        <p>If you face the challenge of a shortage of homes in which to invest, don’t worry. We have the solution for you. Investors are able to review a curated listing of available properties on the Invest Out website.</p>
                        <dt>How does Invest Out Inc. Help:</dt>
                        <dd>Invest Out has designed a web portal so that Investors can connect directly with homeowners and Partner to renovate or simply move for a quick sale.</dd>
                        <dd>Invest Out connects investors with property owners and oversees the process from initial inquiry to contracts to the sale. </dd>
                        <dd>Investors and homeowners share the increased profits these improvements generate.</dd>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="howit-works spad">
        <div class="row">
            <div class="col-lg-12" style="padding: 0px;">
                <div class="section-title">
                    <img src="{{asset('affiliate/3.png')}}" alt="How it Works">
                    <a class="btn btn-primary btn-block" href="https://investout.leaddyno.com/" style="padding: 10px 30px">Apply Now</a>
                </div>
            </div>
        </div>
    </section>

    <div class="container text-center">
        <img src="{{asset('assets/front_end/img/BeforeAfterInvestor.png')}}">
    </div>
    <div class="container text-center">
        <div class="container-fluid my-5 mx-2">
            <form id="calculatorForm" class="">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-header">
                                Investment Capital
                            </div>
                            <div class="card-body">
                                    <div class="form-group">
                                        <label for="sellPrice">Sell Price(ARV)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="sellPrice" id="sellPrice" placeholder="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="closingCost">Closing Cost</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="closingCost" id="closingCost" placeholder="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="closingCost">The 70% Rule calculator</label>
                                        <select class="form-control" id="ruleCalculator" name="ruleCalculator">
                                            <option selected value="1">A (ARV-Cost)*Rule%</option>
                                            <!-- <option value="2" selected>B (ARV*Rule%)-Cost</option> -->
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="estimatedCostRepair">Estimated Cost of Repairs</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="estimatedCostRepair" name="estimatedCostRepair" placeholder="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="ruleOption">The Rule Option</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="ruleOption" name="ruleOption" placeholder="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="maximumPurchase">Maximum Purchase</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="maximumPurchase" name="maximumPurchase" placeholder="0">
                                            <div class="input-group-append">
                                                <span class="input-group-text">$</span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Profit Share
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Investor Share</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="investorShare" name="investorShare" placeholder="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Investor's Share</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="investoreShareLabel" id="investoreShareLabel" readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Seller's Share</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="sellerShare" id="sellerShare" placeholder="0" readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">
                                        Loan Financing
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group" style="display: none;">
                                            <label>Outstanding Balance</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="outstandingBalance" name="outstandingBalance" placeholder="0" value="70000">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Loan Terms</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="loanTerms" name="loanTerms" placeholder="0" value="20">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label>Annual Rate</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="annualRate" name="annualRate" placeholder="0" value="4">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Loan to Value</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="loanToValue" name="loanToValue" placeholder="0" value="80">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Loan Amount</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="loanAmount" readonly name="loanAmount" placeholder="0" value="128000">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Interest Rate</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="interestRate" name="interestRate" placeholder="0" value="14">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label>Cash Backed Funding </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="cashBackedFund" name="cashBackedFund" placeholder="0" value="2">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-header">Monthly Expenses</div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Monthly Mortgage</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="monthlyMorgage" name="monthlyMorgage" readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Maintenance</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="maintenance" name="maintenance" placeholder="0" value="80">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Utilities</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="utilities" name="utilities" placeholder="0" value="200">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Insurance</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="insurance" name="insurance" placeholder="0" value="70">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Micellaneous</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="micellaneous" name="micellaneous" placeholder="0" value="50">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold">Total Monthly Expenses</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="monthlyExpenses" name="monthlyExpenses" readonly>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>% of Admin Cost</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="adminCost" name="adminCost" placeholder="0" value="14">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Months of repair</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="monthOfrepair" name="monthOfrepair" placeholder="0" value="6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Months of sell</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="monthOfSell" name="monthOfSell" placeholder="0" value="6">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary" id="calculatebutton">Calculate</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-12" style="margin-top: 20px;">
                    <h3 class="outcomeclass" style="margin-bottom: 20px;">Scenario Outcome</h3>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Project Costs
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Partner</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="partnerValue">$ 0</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Buy</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="BuyValue">$ 0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Revenue - Closing Cost
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Partner</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="revenuePartnerValue">$ 0</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Buy</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="revenueBuyValue">$ 0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Profit from Sale
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Partner</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="profitPartnerValue">$ 0</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Buy</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="profitBuyValue">$ 0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-header">
                                    Return on Investment
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Partner</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="investmentPartnerValue">$ 0</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-form-label"><b>Buy</b></label>
                                        <div class="col-sm-12">
                                            <div class="form-control-static text-center" id="investmentBuyValue">$ 0</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12" style="margin-top: 20px;">
                            <div class="card">
                                <div class="card-header">
                                    Risk : Reward
                                </div>
                                <div class="card-body">
                                    <div class="col-md-6" style="float: left;">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label"><b>Partner</b></label>
                                            <div class="col-sm-12">
                                                <div class="form-control-static text-center" id="riskPartnerValue">$ 0</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: left;">
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-form-label"><b>Buy</b></label>
                                            <div class="col-sm-12">
                                                <div class="form-control-static text-center" id="riskBuyValue">$ 0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <h4 class="text-center pb-1 pt-3">Patent Pending</h4>
        <h4 class="text-center pb-1 pt-3">
            Membership 
            <a href="#" class="terms_and_conditions_link" data-toggle="modal" data-target="#termsAndConditionsModal">
                Terms & Conditions.
            </a>
        </h4>
        <h3 class="text-center pb-1 pt-3">Membership Plan</h2>
        @if(count($plans) > 0)
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <th scope=" row "> <h5>Check out our Membership plan for the investors </h5></th>
                    @foreach($plans as $plan)
                    <td colspan="0" class="tableheading" style="text-align: center;">
                        @if($plan->role == 3)
                            <b>Investor</b>
                        @else
                            <b>Enterprise</b>
                        @endif
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <th></th>
                    @foreach($plans as $plan)
                    <td class="table-data">
                        <b><font size="5">{{$plan->amount}}</font>/{{$plan->interval}}</b>
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>Review Property Listings in need of investment </h5><br>Users have the opportunity to see all of the properties based on their search criteria. Users can see the seller's <br>suggested current (BRV)and projected (ARV)post renovation value. Basic level members are able to purchase different<br>types of information on individual properties(Ale cart) and submit proposals for a fee.</td>
                    @foreach($plans as $plan)
                    <td><h3>✓</h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>Submit proposals to property owners </h5><br> Proposal submissions are only available for the Enterprise membership level or if purchased through Ale cart services<br> for the Basic level of membership.</td>
                    @foreach($plans as $plan)
                    <td><h3>✓</h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>View Property Inspection Reports where available </h5>Property inspection report reviews are only available for the Enterprise membership level or if purchased through Ale <br>cart services for the Basic level of membership. </td>
                    @php $i = 0;  @endphp
                    @foreach($plans as $plan)
                        <td><h3>
                            ✓
                        </h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>Review Title & Lien Search Results where available </h5>Title & Lien search results are only available for the Enterprise membership level or if purchased through Ale cart<br>services for the Basic level of membership. </td>
                    @php $i = 0;  @endphp
                    @foreach($plans as $plan)
                        <td><h3>
                            ✓
                        </h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>Invest Out facilitation of services* </h5>if through the Ale carte services if the Basic membership level is awarded the project by the Seller, Invest Out services<br> are additionally awarded to the investor based on the Enterprise level services. </td>
                    @php $i = 0;  @endphp
                    @foreach($plans as $plan)
                        <td><h3>
                            ✓
                        </h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "><h5>Communicate directly with home owners* </h5>Enterprise level members will have the option to communicate real time with property owners</td>
                    @php $i = 0;  @endphp
                    @foreach($plans as $plan)
                        <td><h3>
                            ✓
                        </h3></td>
                    @endforeach
                </tr>
                <tr>
                    <td scope="row "></td>
                    @php $i = 0;  @endphp
                    @foreach($plans as $plan)
                    <td><a target="_blank" href="{{config('app.basepath.APP_URL')}}register?plan={{$plan->plan_id}}" class="btn btn-primary btn-block">Sign Up</a></td>
                    @php $i++;  @endphp
                    @endforeach
                </tr>
            </tbody>
        </table>
        @else
            <h5 style="margin-bottom: 30px;">No plans found!</h5>
        @endif
    </div>
    <div class="text-center">
        <img src="{{asset('assets/front_end/img/investor/investor.png')}}">
    </div>
    <div class="modal fade" id="termsAndConditionsModal" tabindex="-1" role="dialog" aria-labelledby="termsAndConditionsModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Membership Terms & Conditions </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p>These free trial terms and conditions govern the free trial of the InvestOut web portal:</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul id="tandcList">
                            <li>After signing up for the free trial, you will have access to the complete functionality of
                                the InvestOut web portal for a period of 30 days, beginning from the moment you
                                complete the registration process.</li>
                            <li>You may use this free trial only once.</li>
                            <li>You have the option to cancel your membership anytime during this trial period.</li>
                            <li>You will not be charged any membership fee before this 30 days trial period ends.</li>
                            <li>At the end of the trial period, you will be charged the monthly membership fee on the
                                31st day from the time of your registration and your subscription will be renewed
                                automatically.</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>See InvestOut help center for more information.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default tandcButton" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#investor").addClass('active');
</script>
<script type="text/javascript">
    var formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    });

    /*
     * ir   - interest rate per month
     * np   - number of periods (months)
     * pv   - present value
     * fv   - future value
     * type - when the payments are due:
     *        0: end of the period, e.g. end of month (default)
     *        1: beginning of period
     */
    function PMT(ir, np, pv, fv, type) {
        var pmt, pvif;

        fv || (fv = 0);
        type || (type = 0);

        if (ir === 0)
            return -(pv + fv) / np;

        pvif = Math.pow(1 + ir, np);
        pmt = -ir * pv * (pvif + fv) / (pvif - 1);

        if (type === 1)
            pmt /= (1 + ir);

        return pmt;
    }
    $('#investorShare').on('blur',function(){
        if($('#investorShare').val() != ''){
            $('#investoreShareLabel').val($(this).val());
            $('#sellerShare').val(100 - $(this).val());
        }else{
            $('#sellerShare').val('');
        }
        $("#calculatebutton").click();
    });

    $('#sellPrice,#estimatedCostRepair,#ruleOption,#ruleCalculator').on('blur change',function(e){
        if($('#sellPrice').val() != ''){
            if($('#ruleCalculator').val() == 1){
               var maximumPrice =  ($('#sellPrice').val() -  $('#estimatedCostRepair').val()) * ($('#ruleOption').val() / 100);
            }else if($('#ruleCalculator').val() == 2){
                var maximumPrice =  ($('#sellPrice').val() * ($('#ruleOption').val() / 100)) - $('#estimatedCostRepair').val();
            }
        }else{
            var maximumPrice =  '';
        }
        $('#maximumPurchase').val(maximumPrice);
        $('#maximumPurchase').trigger('blur');
    });
    $('#loanToValue,#maximumPurchase').on('blur',function(){
        if($('#sellPrice').val() != 0){
            var loanAmountCalculate = ($('#loanToValue').val() * $('#maximumPurchase').val()).toFixed(0).slice(0,-2);
            $('#loanAmount').val(loanAmountCalculate);
        }else{
            $('#loanAmount').val('0');
        }
        $('#loanAmount').trigger('blur');
    });
    $('#sellPrice,#interestRate,#loanTerms,#loanAmount').on('blur',function(){
        if($('#sellPrice').val() != 0){
            var monthlyMorgage = Math.abs(PMT(($('#interestRate').val() / 100) / 12 , $('#loanTerms').val() * 12,$('#loanAmount').val()) / 100).toFixed();
            $('#monthlyMorgage').val(monthlyMorgage);
        }else{
            $('#monthlyMorgage').val('');
        }
        $('#monthlyMorgage').trigger('blur');
    });
    $('#monthlyMorgage,#maintenance,#utilities,#insurance,#micellaneous').on('blur',function(){
        var monthlyExpenses = parseFloat($('#monthlyMorgage').val() ? $('#monthlyMorgage').val() : 0) +
                parseFloat($('#maintenance').val() ? $('#maintenance').val() : 0) +
                parseFloat($('#utilities').val() ? $('#utilities').val() : 0) +
                parseFloat($('#insurance').val() ? $('#insurance').val() : 0) +
                parseFloat($('#micellaneous').val() ? $('#micellaneous').val() : 0);
        $('#monthlyExpenses').val(monthlyExpenses);
        $('#monthlyExpenses').trigger('blur');
    });

    $('#calculatorForm').validate({
        rules: {
            sellPrice :{ required: true,number:true},
            closingCost :{ required: true,number:true},
            ruleCalculator :{ required: true,number:true},
            estimatedCostRepair :{ required: true,number:true},
            ruleOption :{ required: true,number:true},
            maximumPurchase :{ required: true,number:true},
            investorShare :{ required: true,number:true,max:100},
            investoreShareLabel :{ required: true,number:true},
            sellerShare :{ required: true,number:true},
            outstandingBalance :{ required: true,number:true},
            loanTerms :{ required: true,number:true},
            annualRate :{ required: true,number:true},
            loanToValue :{ required: true,number:true},
            loanAmount :{ required: true,number:true},
            interestRate :{ required: true,number:true},
            cashBackedFund :{ required: true,number:true},
            maintenance :{ required: true,number:true},
            utilities :{ required: true,number:true},
            insurance :{ required: true,number:true},
            micellaneous :{ required: true,number:true},
            adminCost :{ required: true,number:true},
            monthOfrepair :{ required: true,number:true},
            monthOfSell :{ required: true,number:true},
        },
        submitHandler: function (form) {
            $(form).find('input[type="submit"]').attr('disabled', true);
            var sellPrice = $('#sellPrice').val();
            var closingCost = $('#closingCost').val();
            var estimatedCostRepair = $('#estimatedCostRepair').val();
            var ruleOption = $('#ruleOption').val();
            var maximumPurchase = $('#maximumPurchase').val();
            var investorShare = $('#investorShare').val();
            var partnerValue = '';
            var revenuePartner = '';
            var revenueBuy = '';
            var profitPartner = '';
            var profitBuy = '';
            var investmentPartner = '';
            var investmentBuy = '';
            var riskPartner = '';
            var riskBuy = '';

            if(sellPrice != '' || sellPrice != 0) {
                if (investorShare != 0) {
                    partnerValue = estimatedCostRepair;
                }
                revenueBuy = (sellPrice-(sellPrice * (closingCost / 100)));
            }
            buyValue = ((parseFloat(maximumPurchase)) + parseFloat(maximumPurchase * (closingCost / 100))) +
                    parseFloat($('#monthlyExpenses').val() * (parseFloat($('#monthOfrepair').val()) + parseFloat($('#monthOfSell').val())) + parseFloat(estimatedCostRepair));
            $('#partnerValue').html( formatter.format(partnerValue));
            $('#BuyValue').html(formatter.format(buyValue));


            if(investorShare != '' || sellPrice != 0) {
                revenuePartner = (sellPrice-(sellPrice * (closingCost / 100)));
            }
            $('#revenuePartnerValue').html(formatter.format(revenuePartner));
            $('#revenueBuyValue').html(formatter.format(revenueBuy));

            if(sellPrice != '' || sellPrice != 0) {
                if(investorShare != '' || investorShare != 0) {
                    profitPartner = ((revenuePartner-partnerValue-maximumPurchase) * investorShare) / 100;
                    investmentPartner = ((1 + ((profitPartner-partnerValue)/partnerValue)) * 100).toFixed();
                    riskPartner = '1 : ' + (1/(partnerValue / profitPartner)).toFixed(1);
                }
                profitBuy = revenueBuy - buyValue;
                investmentBuy = ((revenueBuy - buyValue) / buyValue * 100).toFixed();
                riskBuy = '1 : ' + (1/(buyValue / profitBuy)).toFixed(1);
            }
            $('#profitPartnerValue').html(formatter.format(profitPartner));
            $('#profitBuyValue').html(formatter.format(profitBuy));

            $('#investmentPartnerValue').html(investmentPartner+'%');
            $('#investmentBuyValue').html(investmentBuy+'%');

            $('#riskPartnerValue').html(riskPartner);
            $('#riskBuyValue').html(riskBuy);
        }
    });
</script>
@endsection

