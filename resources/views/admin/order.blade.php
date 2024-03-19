<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style>
        .title_deg{
            text-align: center;
            font-size: 25px;
            font-weight: bold;
        }
        .img_size{
            width: 200px;
            height: 200px;
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
                <h1 class="title_deg">All Order</h1>
                
                <div style="padding-left: 400px; padding-bottom: 30px;">
                    <form action="{{url('search')}}" method="GET">
                        @csrf
                        
                        <input style="color: black;" type="text" name="search" placeholder="Search For Something">
                        <input type="submit" value="Search" class="btn btn-outline-primary">
                    
                    </form>
                </div>

                <div class="table-responsive m-2">

                    <table class="table table-dark table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product title</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>payment Status</th>
                                <th>Delivery Status</th>
                                <th>image</th>
                                <th>delivered</th>
                                <th>Print PDF</th>
                                <th>Send Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @forelse ($order as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product_title}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price}}</td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <img src="/product/{{$order->image}}" alt="{{$order->name}}" class="img_size">
                                    </td>
                                    <td>
                                        @if ($order->delivery_status == 'processing')
                                        <a href="{{url('delivered', $order->id)}}" class="btn btn-primary" onclick="return confirm('Are You Sure This product is delivered !!!')">Delivered</a>
                                            
                                        @else
                                            <p style="color: chartreuse">Delivered</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Print PDF</a>
                                    </td>
                                    <td>
                                        <a href="{{url('send_email', $order->id)}}" class="btn btn-info">Send Email</a>
                                    </td>
                                </tr>
                            @empty
                                <div>
                                    <tr>
                                        <td colspan="16">No Data Found</td>
                                    </tr>
                                </div>
                            @endforelse
                            
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