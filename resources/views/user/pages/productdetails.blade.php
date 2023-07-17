@extends('user.master')

@section('user.content')
    @include('user.nav')
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <form action="{{ url('/add_cart/' . $products->id) }}" method="post">
                    @csrf
                    <!-- Product main img -->
                    <div class="col-md-5 col-md-push-2">
                        <div id="product-main-img">

                            <div class="product-preview">
                                <img name="image" src="{{ asset('/image/' . $products->image) }}">
                                {{-- <img src="./images/color/202305131644photo-1581362716668-90cdec6b4882.jpg" alt="">  --}}
                            </div>

                        </div>
                    </div>
                    <!-- /Product main img -->

                    <!-- Product thumb imgs -->
                    <div class="col-md-2  col-md-pull-5">
                        <div id="product-imgs">
                            <div class="product-preview">
                                <img name="image"
                                    src="{{ asset('./images/color/202305131644photo-1581362716668-90cdec6b4882.jpg') }}">
                            </div>

                            <div class="product-preview">
                                <img name="image"
                                    src="{{ asset('./images/color/202305131644photo-1581362716668-90cdec6b4882.jpg') }}">
                            </div>

                            <div class="product-preview">
                                <img name="image"
                                    src="{{ asset('./images/color/202305131644photo-1581362716668-90cdec6b4882.jpg') }}">
                            </div>

                            <div class="product-preview">
                                <img name="image"
                                    src="{{ asset('./images/color/202305141203medium1648720986LHrPr31204.png') }}">
                            </div>
                        </div>
                    </div>
                    <!-- /Product thumb imgs -->

                    <!-- Product details -->
                    <div class="col-md-5">
                        <div class="product-details">
                            <h2 class="product-name">{{ $products->name }}</h2>
                            {{-- <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a>
                        </div>  --}}
                            <div>
                                @if ($products->discount_price)
                                    <h3 class="product-price" name="price"><b>
                                            &#2547;{{ $products->discount_price }}</b> <del
                                            class="product-old-price">&#2547;{{ $products->price }}</del></h3>
                                @else
                                    <h3 class="product-price" name="price"><b>
                                            &#2547; {{ $products->price }}</b></h3>
                                @endif
                                <span class="product-available">In Stock</span>

                            </div>
                            <p>{{ $products->description }}</p>

                            <div class="product-options">
                                <label>Size:
                                    <select class="form-control" name="size">
                                        <option>Choose Size</option>
                                        @foreach (Json_decode($products->size) as $sizee)
                                            <option value="{{ $sizee }}">{{ $sizee }}</option>
                                        @endforeach


                                    </select>
                                </label>
                                <label>
                                    <label>Color:
                                        <select class="form-control" name="color">
                                            <option>Choose Color</option>

                                            <option value="{{ $products->color }}">{{ $products->color }}</option>

                                        </select>
                                    </label>
                                </label>
                            </div>

                            <div class="add-to-cart">
                                <div class="qty-label">
                                    Qty
                                    <div class="input-number">
                                        <input type="number" name="quantity" value="0" required>
                                        <span class="qty-up">+</span>
                                        <span class="qty-down">-</span>
                                    </div>
                                </div>
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to carrt</button>
                            </div>
                        </form>
                            <ul class="product-btns">
                            <form action="{{ url('/wishlist/'.$products->id) }}" method="post">
                                    @csrf
                                <li><button><i class="fa fa-heart-o"></i> add to wishlist</button></li>

                                {{-- <li><a href="#"><i cnlass="fa fa-exchange"></i> add to compare</a></li>  --}}
                            </form>
                            </ul>

                            <ul class="product-links">
                                <li>Category:</li>
                                <li><a href="#"><b>{{ $products->category }}</b></a></b></li>
                            </ul>

                            {{--  <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>  --}}

                        </div>
                    </div>
                    <!-- /Product details -->
                {{-- </form> --}}
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


@endsection
