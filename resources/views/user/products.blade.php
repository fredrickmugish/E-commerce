<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">

         @foreach ($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ url('/productdetail', $products->id) }}" class="option1">
                     Product Detail
                     </a>
                   <!--Add to cart form-->
       <form action="{{ url('/addcart', $products->id) }}" method="post" enctype="multipart/form-data">
      @csrf
         <div class="row">
    <div class="col-md-4">
      <input type="number" value="1" min="1" name="quantity">
    </div>

     <div class="col-md-4">
      <input type="submit" value="Add to Cart">
     </div>
         </div>
       </form>

       <!--End of Add to cart form-->

                  </div>
               </div>
               <div class="img-box">
                  <img src="/productimage/{{ $products->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $products->title }}
                  </h5>

                  @if($products->discount_price!=null)

                  <h6 style="color: red">
                     Discount
                     <br>
                    ${{ $products->discount_price }}
                  </h6>


                  <h6 style="text-decoration:line-through; color:blue">
                     Price
                     <br>
                     ${{ $products->price }}
                  </h6>

                @else
                <h6 style="color: blue">
                  Price
                  <br>
                  ${{ $products->price }}
               </h6>
                  @endif

               </div>
            </div>
         </div>
         
         @endforeach
    </div>
 </section>