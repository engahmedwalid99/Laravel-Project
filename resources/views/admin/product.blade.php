<!DOCTYPE html>
<html lang="en">
  <head>
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
@include('admin.css')

  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <div class="container" align="center">
          {{-- form start here    --}}

          @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert">X</button>
    </div>
@endif
<h1 class="title">Add Products</h1>


       

        <form action="{{url('uploadproduct')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div style="padding: 15px">
                <label for="name">Product</label>
                <input style="color: black;" type="text" name="product" id="product" placeholder="Give a product title" required="">
            </div>


            <div style="padding: 15px">
                <label for="name">Price</label>
                <input style="color: black;" type="text" name="price" id="price" placeholder="Give a product price" required="">
            </div>



            <div style="padding: 15px">
                <label for="name">Description</label>
                <input style="color: black;" type="text" name="Description" id="Description" placeholder="Give a product Description" required="">
            </div>



            <div style="padding: 15px">
                <label for="name">quantity</label>
                <input style="color: black;" type="text" name="quantity" id="quantity" placeholder="Give a product quantity" required="">
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