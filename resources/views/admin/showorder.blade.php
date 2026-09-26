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


    <table>
        <tr style="background-color:grey">
            <td style="padding: 20px">Customer Name</td>
            <td style="padding: 20px">Phone</td>
            <td style="padding: 20px">Address</td>
            <td style="padding: 20px">Product Title</td>
            <td style="padding: 20px">Price</td>
            <td style="padding: 20px">Quantity</td>
            <td style="padding: 20px">Status</td>
            <td style="padding: 20px">Action</td>
        </tr>

        @foreach ($order as $item)
            <tr style="border: 2px solid grey; text-align: center;">
                <td style="padding: 20px">{{ $item->name }}</td>
                <td style="padding: 20px">{{ $item->phone }}</td>
                <td style="padding: 20px">{{ $item->address }}</td>
                <td style="padding: 20px">{{ $item->product_name }}</td>
                <td style="padding: 20px">{{ $item->price }}</td>
                <td style="padding: 20px">{{ $item->quantity }}</td>
                <td style="padding: 20px">{{ $item->status }}</td>
                <td style="padding: 20px"><a href="{{url('updatestatus', $item->id)}}" class="btn btn-success">Delivered</a></td>
            </tr>
        @endforeach
        <tr>
            <td>

            </td>
        </tr>
    </table>

</div>
</div>
          <!-- partial -->
          @include('admin.script')
         </body>
</html>