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
                        @foreach ($categories as $category)
                            <div class="checkbox-filter">

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1">
                                    <label for="category-1">
                                        <span></span>
                                        {{ $category->name }}
                                        <small>(120)</small>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /aside Widget -->
                    <!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider"></div>
								<div class="input-number price-min">
									<input class="range" id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input class="range"  id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
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
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->



                    <!-- store products -->
                    <div class="row">


                        @foreach ($products as $product)
                            {{-- @dd($products); --}}
                            <!-- product -->
                            <div class="col-md-4 col-xs-6">
                                <a href="{{ url('productbycat', $product->id) }}"></a>
                                <div class="product">
                                    <form action="{{ url('/add_cart/' . $product->id) }}" method="post">
                                        @csrf

                                        <div class="product-body">
                                            <div class="product-img">
                                                <img name="image" style="height: 150px; width: 100px"
                                                    src="{{ asset('/image/' . $product->image) }}">
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
                                            <div class="product-btns" style="display:flex; gap:5px; justify-content:center;">
                                                {{-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button> --}}
                                            <form class="qbtn" action="{{ url('/wishlist/'.$product->id) }}" method="post" class="">
                                              @csrf
                                                <button  class="wishLists" style="">
                                                    <a
                                                    class="fa fa-heart-o"
                                                    href="" style=""></a><span class="tooltip">add to wishlist</span>
                                                </button>
                                            </form>
                                                {{-- <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> --}}
                                                <button  class="quick-view"><a
                                                    class="fa fa-eye"
                                                    href="{{ url('/product-details/' . $product->id) }}"></a><span class="tooltipp"> quick view</span>
                                                </button>
                                                <button class="add-to-cart-btn"><a
                                                    class="fa fa-shopping-cart"
                                                    href="{{ url('/product-details/' . $product->id) }}" style=""></a><span class="tooltipp"> add to cart</span></button>
                                            </div>
                                        </div>
                                        {{--  <div class="add-to-cart">
                                            <button name="" class="add-to-cart-btn"><i
                                                    class="fa fa-shopping-cart"></i> add to cart</button>
                                        </div>  --}}
                                    </form>
                                </div>

                            </div>
                            <!-- /product -->
                        @endforeach

                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
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
