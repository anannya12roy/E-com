@extends('user.master')

@section('user.content')
    @include('user.nav')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">
                            @foreach ($categories as $category)
                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        {{ $category->name }}
                                        <small></small>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /aside Widget -->

                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">

                        </div>

                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach ($products as $product)
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <a href="{{ url('productbycat', $product->id) }}"></a>
                                <div class="product">
                                    <form action="{{ url('/add_cart/' . $product->id) }}" method="post">
                                        @csrf
                                        {{--									<div class="product-img"> --}}
                                        {{--										<img src={{ asset('image/'.$product->image) }};  alt=""> --}}
                                        {{--									</div> --}}
                                        <div class="product-body">
                                            <div class="product-img">
                                                <img name="image" style="height: 150px; width: 100px"
                                                    src="{{ asset('/image/' . $product->image) }}">
                                                {{--  <img name="image" style="height: 150px; width: 100px" src={{ asset('image/'.$product->image) }}  alt="">  --}}
                                            </div>
                                            <h3 class="product-name" name="name"><a
                                                    href="#">{{ $product->name }}</a></h3>

                                            @if ($product->discount_price)
                                                <p class="product-price" name="price"><b>
                                                        &#2547;{{ $product->discount_price }}</b> <del
                                                        class="product-old-price">&#2547;{{ $product->price }}</del></p>
                                            @else
                                                <p class="product-price" name="price"><b>
                                                        &#2547; {{ $product->price }}</b>
                                            @endif

                                            </p>
                                            <div class="product-btns">
                                                <button name="wishlist" class="add-to-wishlist"><i
                                                        class="fa fa-heart-o"></i><span class="tooltipp">add to
                                                        wishlist</span></button>
                                                {{--  <button name="compare" class="add-to-compare"><i
                                                        class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>  --}}
                                                <button name="quickview" class="quick-view"><i class="fa fa-eye"></i><span
                                                        class="tooltipp">quickview</span></button>
                                                <button name="" class="add-to-cart-btn"><a
                                                        class="fa fa-shopping-cart"
                                                        href="{{ url('/product-details/' . $product->id) }}"></a>
                                                    <span class="tooltipp">Add to Cart</span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            <!-- /product -->
                        @endforeach

                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing all products</span>
                        <ul class="store-pagination">
                           
                        </ul>
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
