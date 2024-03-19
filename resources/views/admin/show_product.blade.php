<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .img_size{
            width: 100px;
            height: 100px;
        }
        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
            width: 100%;
        }
        .th_color{
            background: rgb(89, 93, 95);
        }
        .th_deg{
            padding: 20px;
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

                <div class="center table-responsive m-2">

                    <table class="table-dark table-hover">
                        <thead class="thead-dark">
                            <tr class="th_color">
                                <th class="th_deg">Product title</th>
                                <th class="th_deg">Description</th>
                                <th class="th_deg">Quantity</th>
                                <th class="th_deg">Catagory</th>
                                <th class="th_deg">Price</th>
                                <th class="th_deg">Discount Price</th>
                                <th class="th_deg">Product Image</th>
                                <th class="th_deg">Delete</th>
                                <th class="th_deg">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->quantity}}</td>
                                    <td>{{$product->catagory}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->discount_price}}</td>
                                    <td>
                                        <img class="img_size" src="/product/{{$product->image}}" alt="{{$product->title}}">
                                    </td>
                                    <td><a href="{{url('delete_product', $product->id)}}" class="btn btn-danger"  onclick="return confirm('Are You Sure To Delete This')">Delete</a></td>
                                    <td><a href="{{url('update_product',  $product->id)}}" class="btn btn-primary">Edit</a></td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
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