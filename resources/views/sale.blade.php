@include('inc.head', ['title'=>'Sale init'])
<div class="container">
    <div class="row">

        <form class="form-horizontal" method="post" action="/payment">
            @csrf
            <fieldset>
                <legend>New sale creation</legend>
                <div class="form-group">
                    <label for="product_name" class="col-lg-2 control-label">Product name</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product name" value="Book">
                    </div>
                </div>
                <div class="form-group">
                    <label for="sale_price" class="col-lg-2 control-label">Price</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Price" value="12.33">
                    </div>
                </div>

                <div class="form-group">
                    <label for="select" class="col-lg-2 control-label">Currency</label>
                    <div class="col-lg-10">
                        <select class="form-control" id="currency" name="currency">
                            <option value="ILS">ILS</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <button type="reset" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-primary">Insert payment details</button>
                    </div>
                </div>
            </fieldset>
        </form>


    </div>
</div>
@include('inc.footer')
