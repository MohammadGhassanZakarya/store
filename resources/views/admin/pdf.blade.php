<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order PDF</title>
</head>
<body>
    <h1>Order Details</h1>
    Customer name :<h3>{{$order->name}}</h3>
    Customer email :<h3>{{$order->email}}</h3>
    Customer phone :<h3>{{$order->phone}}</h3>
    Customer address :<h3>{{$order->address}}</h3>
    Customer user_id :<h3>{{$order->user_id}}</h3>
    Customer product_title :<h3>{{$order->product_title}}</h3>
    Customer price :<h3>{{$order->price}}</h3>
    Customer Quantity :<h3>{{$order->quantity}}</h3>
    Customer payment_status :<h3>{{$order->payment_status}}</h3>
    Customer product_id :<h3>{{$order->product_id}}</h3>
    
    <br><br>
    <img height="250" width="450" src="product/{{$order->image}}" alt="{{$order->name}}">
</body>
</html>