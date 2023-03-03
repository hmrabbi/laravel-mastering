<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css');
    <style>
        .div_center
        {
            text-align:center;
            padding-top:40px;
        }
        .font_size
        {
            font-size:40px;
            padding-bottom:40px;
        }
        
        .text-color 
        {
            color:black;
            padding-bottom:20px;
        }

        label
        {
            display:inline-block;
            width:200px;
        }
        .div_design
        {
            padding-bottom:15px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar');
      <!-- partial -->
      @include('admin.header');
      <div class="main-panel">
          <div class="content-wrapper">
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
            @endif
               <div class="div_center">
                      <h2 class="font_size">Add Product</h2>
                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                       <label>Product Title:</label>
                       <input class="text-color" type="text" name="title" placeholder="Write a Title" required="">
                   </div>

                   <div class="div_design">
                       <label>Product Description:</label>
                       <input class="text-color" type="text" name="description" placeholder="Write a Description" required="">
                   </div>

                   <div class="div_design">
                       <label>Product Price:</label>
                       <input class="text-color" type="number" name="price" placeholder="Write a Price" required="">
                   </div>

                   <div class="div_design">
                       <label>Discount Price</label>
                       <input class="text-color" type="text" name="dis_price" placeholder="Discount Price">
                   </div>

                   <div class="div_design">
                       <label>Product Quantity:</label>
                       <input class="text-color" type="number" name="quantity" min="0" placeholder="Write a Quantity" required="">
                   </div>

                   <div class="div_design">
                       <label>Product Category</label>
                      <select class="text-color" name="category" required="">
                        <option value="" selected="">Add a category here</option>
                        @foreach($category as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                   </div>

                   <div class="div_design">
                       <label>Product Image</label>
                       <input type="file" name="image" required="">
                   </div>

                   <div class="div_design">
                    <input type="submit" value="Add Product" class="btn btn-primary">
                   </div>
               </form>

               </div>
          </div>
      </div>      
      @include('admin.script');
    <!-- End custom js for this page -->
  </body>
</html>