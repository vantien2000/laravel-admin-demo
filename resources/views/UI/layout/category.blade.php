<div class="container">
    <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->
    
    <div class="cat-blocks-container">
        <div class="row">
            @foreach ($cats as $cat)
                <div class="col-6 col-sm-4 col-lg-2">
                    <a href="" class="cat-block">
                        <figure>
                            <span>
                                <img src="{{ asset('UI/assets/images/demos/demo-4/cats/'.$cat->image) }}" alt="Category image">
                            </span>
                        </figure>

                        <h3 class="cat-block-title">{{ $cat->name }}</h3><!-- End .cat-block-title -->
                    </a>
                </div><!-- End .col-sm-4 col-lg-2 -->
            @endforeach
        </div><!-- End .row -->
    </div><!-- End .cat-blocks-container -->
</div><!-- End .container -->
