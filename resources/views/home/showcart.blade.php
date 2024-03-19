<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <base href="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        .center{
        margin: auto;
        width: 50%;
        border: 2px solid rgb(190, 190, 190);
        text-align: center;
        margin-top: 40px;
        width: auto;
        }
        .th_color{
            background: rgb(89, 93, 95);
        }
        .th_deg{
            padding: 20px;
        }
        .img_size{
            height: 100px;
            width: 100px;
        }
        .total_deg{
            font-size: 20px;
            padding: 40px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
        @endif

            <div class="table-responsive m-2" style="align-self: center; text-align: center;">
            <table class="table-light table-hover" style="margin: auto;">
                <thead class="thead-dark">
                    <tr class="th_color">
                        <th class="th_deg">Product title</th>
                        <th class="th_deg">Product quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">image</th>
                        <th class="th_deg">Action</th>
                    </tr>
                </thead>
                <tbody style="background-color: rgb(228, 228, 228)">
                    <?php $totalprice = 0 ?>
                    @foreach ($cart as $cart)
                        <tr>
                            <td>{{$cart->product_title}}</td>
                            <td>{{$cart->quantity}}</td>
                            <td>{{$cart->price}}</td>
                            <td>
                                <img class="img_size" src="/product/{{$cart->image}}">
                            </td>
                            <td>
                                <a href="{{url('remove_cart', $cart->id)}}" class="btn btn-danger"  onclick="return confirm('Are You Sure To Delete This')">Remove product</a>
                            </td>
                        </tr>
                        <?php $totalprice = $totalprice + $cart->price ?>
                    @endforeach
                    
                </tbody>
            </table>
            <div >
                <h1 class="total_deg">Total Price : {{$totalprice}}</h1>
            </div>
            <div>
                <h1 style="font-size: 25px; padding-bottom: 15px;">Proceed to Order</h1>
                <a href="{{url('/cash_order')}}" class="btn btn-danger">Cash On Delivery</a>
                <a href="{{url('stripe', $totalprice)}}" class="btn btn-danger">Pay Using Card</a>
            </div>
            </div>
      </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>