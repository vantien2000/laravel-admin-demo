<div class="container new-arrivals">
    <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">New Arrivals</h2><!-- End .title -->
        </div><!-- End .heading-left -->

    <div class="heading-right">
            <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                </li>
                @foreach ($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link" id="category-{{ $cat->id }}-link" data-toggle="tab" href="#category-{{ $cat->id }}" role="tab" aria-controls="new-all-tab" aria-selected="false">{{ $cat->name }}</a>
                    </li>
                @endforeach
            </ul>
    </div><!-- End .heading-right -->
    </div><!-- End .heading -->

    <div class="tab-content tab-content-carousel just-action-icons-sm">
        <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
            <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": true, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":2
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        }
                    }
                }'>
                @foreach ($products->sortBy('created_at') as $product)
                    <div class="product product-2">
                        <figure class="product-media">
                            <span class="product-label label-circle label-top">Top</span>
                            <a href="product.html">
                                <img src="{{ asset('UI/assets/images/demos/demo-4/products/'.$product->image) }}" alt="Product image" class="product-image">
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                            </div><!-- End .product-action -->

                            <div class="product-action">
                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                            </div><!-- End .product-action -->
                        </figure><!-- End .product-media -->

                        <div class="product-body">
                            <div class="product-cat">
                                <a href="#">{{ $product->category->name }}</a>
                            </div><!-- End .product-cat -->
                            <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                            <div class="product-price">
                                <span class="new-price">${{ number_format($product->price,2) }}</span>
                                <span class="old-price">${{ number_format($product->old_price,2) }}</span>
                            </div><!-- End .product-price -->
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: {{ $product->rate*20 }}%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <span class="ratings-text">( 4 Reviews )</span>
                            </div><!-- End .rating-container -->
                        </div><!-- End .product-body -->
                    </div><!-- End .product -->
                @endforeach
                
                
            </div><!-- End .owl-carousel -->
        </div><!-- .End .tab-pane -->
        @foreach ($cats as $cat)
            <div class="tab-pane p-0 fade" id="category-{{ $cat->id }}" role="tabpanel" aria-labelledby="new-tv-link">
                <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                    data-owl-options='{
                        "nav": true, 
                        "dots": true,
                        "margin": 20,
                        "loop": false,
                        "responsive": {
                            "0": {
                                "items":2
                            },
                            "480": {
                                "items":2
                            },
                            "768": {
                                "items":3
                            },
                            "992": {
                                "items":4
                            },
                            "1200": {
                                "items":5
                            }
                        }
                    }'>
                    @foreach ($cat->product as $product)
                        <div class="product product-2">
                            <figure class="product-media">
                                <span class="product-label label-circle label-new">New</span>
                                <a href="product.html">
                                    <img src="{{ asset('UI/assets/images/demos/demo-4/products/'.$product->image) }}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                    <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{ $product->category->name }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="product.html">{{ $product->name }}</a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">${{ number_format($product->price,2) }}</span>
                                    <span class="old-price">${{ number_format($product->old_price,2) }}</span>
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: {{ $product->rate}}%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( 4 Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    <a href="#" style="background: #edd2c8;"><span class="sr-only">Color name</span></a>
                                    <a href="#" style="background: #eaeaec;"><span class="sr-only">Color name</span></a>
                                    <a href="#" class="active" style="background: #333333;"><span class="sr-only">Color name</span></a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    @endforeach                    
                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        @endforeach
        
        
    </div><!-- End .tab-content -->
</div><!-- End .container -->