<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')

    <style>
        .div_center{
            text-align: center;
            padding-top:40px; 
        }
        .font_size{
            font-size: 30px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif


                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{url('/update_product_confirm', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="title">title</label>
                            <input value="{{$product->title}}" type="text" name="title" placeholder="Write a title" class="text_color">
    
                        </div>
    
                        <div>
                            <label for="description">Product Description</label>
                            <input value="{{$product->description}}" type="text" name="description" placeholder="Write a description" class="text_color">
    
                        </div>
    
                        <div class="div_design">
                            <label for="price">Product price</label>
                            <input value="{{$product->price}}" type="number" name="price" placeholder="Write a price" class="text_color">
    
                        </div>
    
                        <div class="div_design">
                            <label for="discount_price">discount price</label>
                            <input value="{{$product->discount_price}}" type="number" name="dis_price" placeholder="Write a discount_price" class="text_color">
    
                        </div>
    
                        <div class="div_design">
                            <label for="quantity">Product quantity</label>
                            <input value="{{$product->quantity}}" type="number" name="quantity" placeholder="Write a quantity" class="text_color" min="0">
    
                        </div>

                        <div class="div_design">
                            <label for="catagory">Product catagory :</label>
                            <select class="text_color" name="catagory" required="" >
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>

                                @foreach ($catagory as $catagory)
                                    <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach

                            </select>
                            
                        </div>
    
                        <div class="div_design">
                            <label for="image">Current Product Image :</label>
                            <img src="/product/{{$product->image}}" height="100" width="100" style="margin: auto;">
                        </div>

                        <div class="div_design">
                            <label for="image">Change Product Image :</label>
                            <input type="file" name="image" id="image">
                        </div>

                        <input type="submit" value="Update produce" class="btn btn-outline-primary">

                    </form>
                </div>

            </div>
        </div>
       
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>