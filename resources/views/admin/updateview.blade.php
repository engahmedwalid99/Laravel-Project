<!DOCTYPE html>
<html lang="en">
    <base href="/public">
    
  <head>
@include('admin.css')
<style>
        .title{
            color: white; 
            padding-top:25px; 
            font-size:25px;
        }
        label{
            display: inline-block;
            width:200px;
        }
        /* input{
            color: black;
        } */
    </style>
  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
        <h1 class="title">Add Products</h1>


       

        <form action="{{url('updateproduct',$data->id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="padding: 15px">
                <label for="name">Product</label>
                <input style="color: black;" type="text" name="product" id="product" required="" value="{{$data->title}}" >
            </div>


            <div style="padding: 15px">
                <label for="name">Price</label>
                <input style="color: black;" type="text" name="price" id="price" value="{{$data->price}}" required="">
            </div>



            <div style="padding: 15px">
                <label for="name">Description</label>
                <input style="color: black;" type="text" name="Description" id="Description" value="{{$data->Description}}" required="">
            </div>



            <div style="padding: 15px">
                <label for="name">quantity</label>
                <input style="color: black;" type="text" name="quantity" id="quantity" value="{{$data->quantity}}" required="">
            </div>



             <div style="padding: 15px">
                <label for="name">old Image</label>
                <img width="100px" height="150px" src="/productimage/{{$data->image}}" alt="">
                
            </div>



            <div style="padding: 15px">
                
                <input type="file" name="file" id="file" required="">
            </div>



            <div style="padding: 15px">
                
                <input class="btn btn-success" type="submit">
            </div>



</form>

{{-- form and hare --}}



        </div>
        </div>
          <!-- partial -->
          @include('admin.script')
         </body>
</html>