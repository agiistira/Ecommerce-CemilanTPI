
	<main id="main" class="main-site">
        <style>
            .regprice{
                font-weight:300;
                font-size: 13px !important;
                color: #aaaaaa !important;
                text-decoration:line-through;
                padding-left: 10px;
            }
        </style>
		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="{{ route('home-page') }}" class="link">home</a></li>
					<li class="item-link"><span>detail</span></li>
				</ul>
			</div>
			<div class="row">

				<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
					<div class="wrap-product-detail">
						<div class="detail-media">
							<div class="product-gallery">
                                <ul>

                                    <li data-thumb="{{ asset('assets/images/products')}}/{{$product->image}}">
                                        <img src="{{ asset('assets/images/products')}}/{{$product->image}}" alt="/{{$product->name}}" />
                                    </li>

                                </ul>
							</div>
						</div>
						<div class="detail-info">
                            <h2 class="product-name">{{$product->name}}</h2>
                            <div class="short-desc">
								{!! $product->short_description !!}
                            </div>
							<div class="wrap-price"><span class="product-price">Rp. {{ $product->regular_price }}</span></div>
                            <div class="stock-info in-stock">
                                <p class="availability">Availability: <b>{{$product->stock_status}}</b></p>
                            </div>
                            <div class="quantity">
                                <span>Quantity:</span>
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*" wire:model="qty">
									<a class="btn btn-reduce" href="#" wire:click.prevent="decreseQuantity"></a>
									<a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity"></a>
								</div>
							</div>
							<div class="wrap-butons">
                              
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a>
                                
							</div>
						</div>
						<div class="advance-info">
							<div class="tab-control normal">
								<a href="#description" class="tab-control-item active">description</a>
							</div>
							<div class="tab-contents">
								<div class="tab-content-item active" id="description">
									{!! $product->description !!}
								</div>
								<div class="tab-content-item " id="review">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end main products area-->

				<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
					<div class="widget widget-our-services ">
					</div><!-- Categories widget-->

					<div class="widget mercado-widget widget-product">
						<h2 class="widget-title">Popular Products</h2>
						<div class="widget-content">
							<ul class="products">
								@foreach($popular_products as $p_product)
									<li class="product-item">
										<div class="product product-widget-style">
											<div class="thumbnnail">
												<a href="{{route('product.details',['slug'=>$p_product->slug])}}" title="{{$p_product->name}}">
													<figure><img src="{{ asset('assets/images/products')}}/{{$p_product->image}}" alt="{{$p_product->name}}"></figure>
												</a>
											</div>
											<div class="product-info">
												<a href="{{route('product.details',['slug'=>$p_product->slug])}}" title="{{$p_product->name}}" class="product-name"><span>{{$p_product->name}}</span></a>
												<div class="wrap-price"><span class="product-price">Rp. {{$p_product->regular_price}}</span></div>
											</div>
										</div>
									</li>
								@endforeach
							</ul>
						</div>
					</div>

				</div><!--end sitebar-->

				<div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="wrap-show-advance-info-box style-1 box-in-site">
						<h3 class="title-box">Related Products</h3>
						<div class="wrap-products">
							<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >

								@foreach($related_products as $r_product)
									<div class="product product-style-2 equal-elem ">
										<div class="product-thumnail">
											<a href="{{route('product.details',['slug'=>$r_product->slug])}}" title="{{$r_product->name}}">
												<figure><img src="{{ asset('assets/images/products')}}/{{$r_product->image}}" width="214" height="214" alt="{{$r_product->name}}"></figure>
											</a>
											<div class="group-flash">
												<span class="flash-item new-label">new</span>
											</div>
											<div class="wrap-btn">
												<a href="#" class="function-link">quick view</a>
											</div>
										</div>
										<div class="product-info">
											<a href="{{route('product.details',['slug'=>$r_product->slug])}}" class="product-name"><span>{{$r_product->name}}</span></a>
											<div class="wrap-price"><span class="product-price">Rp. {{$r_product->regular_price}}</span></div>
										</div>
									</div>
								@endforeach
							</div>
						</div><!--End wrap-products-->
					</div>
				</div>

			</div><!--end row-->

		</div><!--end container-->

	</main>