<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    @include('admin.css')
    <style>
        label{
            display: inline-block;
            width: 200px;
            font-size: 15px;
            font-weight: bold;
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

                <h1 style="text-align: center; font-size: 25px">Send Email to {{$order->email}}</h1>

                <form action="{{url('send_user_email', $order->id)}}" method="post">
                    @csrf

                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email Greeting</label>
                        <input style="color: black;" type="text" name="greetion">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email FirstLine</label>
                        <input style="color: black;" type="text" name="firstline">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email body</label>
                        <input style="color: black;" type="text" name="body">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email Button name</label>
                        <input style="color: black;" type="text" name="button">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email Url</label>
                        <input style="color: black;" type="text" name="url">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <label for="greeting">Email Last Line</label>
                        <input style="color: black;" type="text" name="lastline">
    
                    </div>
                    <div style="padding-left: 35%; padding-top: 30px;">
    
                        <input style="color: black;" type="submit" value="Send Email" class="btn btn-primary">
    
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>