 @extends('website.layout')
 @section('content') 

    <div class="main-content">
            <div class="title-page">
                <h3>Cart</h3>
            </div>
            <div class="cart-box-container">
                <div class="container container-ver2">
                    <div class="col-md-8">
                        <table class="table cart-table space-80">
                            <thead>
                                <tr>
                                    <th class="product-photo">Product</th>
                                    <th class="produc-name"></th>
                                    <th class="product-quantity">qty</th>
                                    <th class="total-price">Total</th>
                                    <th class="product-remove"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $key => $item)
                                <tr class="item_cart">
                                    <td class="product-photo"><img src="{{ asset('/storage/ProductImages/Prod-'.$item->id) }}" alt="" height="100" width="100"></td>
                                    <td class="produc-name"><a href="#" title="">{{$item->name}}</a><p class="price">${{$item->price}}</p><input type="hidden"></td>
                                    <td class="product-quantity">
                                        <form enctype="multipart/form-data">
                                        <div class="product-signle-options product_15 clearfix">
                                            <div class="selector-wrapper size">
                                                <div class="quantity">
                                                    <input data-step="1" value="{{$item->quantity}}" title="Qty" class="qty" size="4" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    </td>
                                    <td class="total-price">${{$item->price}}</td>
                                    <td class="product-remove"><a class="remove" href="#" title=""></a></td>
                                </tr>
                                <!-- End item -->
                                @endforeach 
                            </tbody>
                        </table>
                        <div class="contact-form coupon">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label class=" control-label" for="inputfname">Coupon</label>                            
                                        <input type="text" class="form-control" id="inputfname" placeholder="Enter your Coupon code...">       
                                        <button value="Submit" class="btn link-button link-button-v2 hover-white color-red" type="submit">APLLY COUNPON</button>
                                    </div> 
                                </form> 
                            </div>
                        </div>
                        <!-- End contact-form -->
                    <div class="col-md-4">
                        <div class="text-price">
                            <h3>CART TOTALS</h3>
                            <ul>
                                <li><span class="text">Subtotal</span><span class="number">$89.00</span></li>
                                <li><span class="text">Shipping</span>
                                    <div class="payment">
                                       <form action="#">
                                          <input type="radio" name="gender" value="Flat" id="radio1" checked="checked">
                                          <label for="radio1">Flat Rate: $100.00</label>
                                          <input type="radio" name="gender" value="Free" id="radio2">
                                          <label for="radio2">Free Shipping</label>
                                          <input type="radio" name="gender" value="Delivery" id="radio3">
                                          <label for="radio3">International Delivery: $170.00</label>
                                          <input type="radio" name="gender" value="Local-Delivery" id="radio4">
                                          <label for="radio4">Local Delivery: $60.00</label>
                                          <input type="radio" name="gender" value="Pickup" id="radio5">
                                          <label for="radio5">Local Pickup (Free)</label>
                                        </form> 
                                    </div>
                                </li>
                                <li><span class="text calculate">Calculate shipping</span>
                                    <form class="zipcode" action="#">
                                        <input type="text" class="form-control" placeholder="Zipcode">
                                    </form>
                                </li>
                                <li><span class="text">Totals</span><span class="number">$89.00</span></li>
                            </ul>
                            <a class="btn link-button hover-white update" href="#" title="UpDATE CART">UpDATE CART</a>
                            <a class="btn link-button hover-white checkout" href="#" title="Proceed to checkout">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
                <!-- End container -->
            </div>
            <!-- End cat-box-container -->
        </div>
 @endsection        