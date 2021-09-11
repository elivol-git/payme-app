@include('inc.head', ['title'=>'Sales list'])

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <hl>Sales list</hl>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Sale number</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Currency</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($salesList as $sale)
                            <tr>
                                <td>{{ $sale->created_at }}</td>
                                <td><a href="{{ $sale->sale_url }}" target="sale_desc"><span>{{ $sale->payme_sale_id }}</span></a></td>
                                <td>{{ $sale->product_name }}</td>
                                <td>{{ $sale->input_price }}</td>
                                <td>{{ $sale->currency }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@include('inc.footer')
