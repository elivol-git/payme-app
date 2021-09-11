@include('inc.head', ['title'=>'Payment process'])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Payment process</h1>

@if($status_code===0)
    <p>Please fill out the following form</p>
<iframe id="payment_form" src="{{$sale_url}}"></iframe>
@else
    <p class="alert alert-danger" role="alert">{{$status_error_details}}</p>
@endif
        </div>
    </div>
</div>
@include('inc.footer')

