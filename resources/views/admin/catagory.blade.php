<!DOCTYPE html>
<html lang="en">
<head>
    @include('admin.css')
    <style type="text/css">
        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font{
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color{
            color: black;
        }
        .center{
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 30px;
            border: 3px solid green;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')
        

        <div class="main-panel">
            <div class="content-wrapper">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                @endif

                <div class="div_center">
                    <h2 class="h2_font">Add Catagory</h2>
                    <form action="{{url('/add_catagory')}}" method="POST">
                        @csrf
                        <input type="text" name="catagory" class="input_color" placeholder="Write Catagory Name">
                        <input type="submit" name="submit" value="Add Catagory" class="btn btn-primary">

                    </form>

                    <div class="table-responsive m-2">

                        <table class="table table-dark table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Catagory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $data)
                                    <tr>
                                        <td>{{$data->catagory_name}}</td>
                                        <td>
                                            <a href="{{url('delete_catagory', $data->id)}}" class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    
                </div>
            </div>
        </div>

    </div>
    
    @include('admin.script')
</body>
</html>