<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.css')
  </head>
  <body>
    @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
    


<div class="container-fluid page-body-wrapper">
    <div class="container" align="center">


@if(session()->has('message'))

        <div class="alert alert-success alert-dismissible">
        {{ session()->get('message') }}
        <button type="button" class="close" data-dismiss="alert">X</button>
    </div>
@endif


<table>
    <tr style="background-color: grey">
        <td style="padding: 20px">id</td>
        <td style="padding: 20px">title</td>
        <td style="padding: 20px">price</td>
        <td style="padding: 20px">Description	</td>
        <td style="padding: 20px">quantity</td>
        <td style="padding: 20px">image</td>
        <td style="padding: 20px">Update</td>
        <td style="padding: 20px">Delete</td>
    </tr>


@foreach ($data as $product)
    
<tr style="background-color: black">
    <td style="padding: 20px">{{$product->id}}</td>
    <td style="padding: 20px">{{$product->title}}</td>
    <td style="padding: 20px">{{$product->price}}</td>
    <td style="padding: 20px">{{$product->Description}}</td>
    <td style="padding: 20px">{{$product->quantity}}</td>


    <td><img width="40px" height="60px" src="/productimage/{{$product->image}}" alt=""></td>
    <td>
       <a href="{{url('updateview', $product->id)}}" class="btn btn-success">
            Update
        </a>
    </td>
    <td> 
        <a href="{{url('deleteproduct', $product->id)}}" class="btn btn-danger">
            Delete
        </a>
    </td>
</tr>


@endforeach

</table>




    </div>
</div>






          <!-- partial -->
          @include('admin.script')
         </body>
</html>