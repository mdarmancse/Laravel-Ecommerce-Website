@extends('Layout.app')
@section('title','Products')
@section('content')
    <!-----Table--->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">Products</li>
            </ol>
            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5 d-none">
                    <button id="addNew" type="button" class=" btn btn-sm btn-danger">Add Products</button>
                    <table id="productsDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Category</th>
                            <th class="th-sm">Subcategory</th>
                            <th class="th-sm">Product Name</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Size</th>
                            <th class="th-sm">Color</th>
                            <th class="th-sm">Quantity</th>
                            <th class="th-sm">Price</th>
                            <th class="th-sm">Status</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="productsTable">


                        </tbody>
                    </table>

                </div>

            </div>


            <!-----Loader--->

            <div id="loaderDiv" class="container">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                    </div>
                </div>
            </div>

            <!-----Went Wrong--->
            <div id="WrongDiv" class="container d-none">
                <div class="row">
                    <div class="col-md-12 text-center p-5">
                        <h3>Something Went Wrong !</h3>
                    </div>
                </div>
            </div>


            <!-----Delete Modal--->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-3 text-center">
                            <h5 class="mt-4">Do You Want To Delete?</h5>
                            <h5 id="DeleteId" class="mt-4 d-none"> </h5>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                            <button id="DeleteConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-----Edit Modal--->

            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-body mx-3">

                            <h5>Want to Update??</h5>

                            <p id="EditId" class="mt-4 d-none"></p>

                            <div id="EditForm" class="d-none">



                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="imgId" class="form-control validate" placeholder="Image">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="catId" class="form-control validate" placeholder="Category">
                                </div>
                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="subcatId" class="form-control validate" placeholder="Subcategory">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="nameId" class="form-control validate" placeholder="Product Name">
                                </div>
                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="desId" class="form-control validate" placeholder="Description">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="sizeId" class="form-control validate" placeholder="Size">
                                </div>
                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="colorId" class="form-control validate" placeholder="Color">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="qtyId" class="form-control validate" placeholder="Quantity">
                                </div>
                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="priceId" class="form-control validate" placeholder="Price">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="statusId" class="form-control validate" placeholder="Status">
                                </div>

                            </div>
                            <div class="text-center">
                                <img id="EditLoader" class="loading-icon m-5" src="{{asset('admin/images/loader.svg')}}">
                                <h5 id="EditWrong" class="d-none">Something Went Wrong!</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">No</button>
                                <button type="button" id="EditConfirmBtn" data-id="" class="btn btn-sm btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-------------------------------Insert MODAL------------------------------------------->


            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">Add Products</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">

                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addimgId" class="form-control validate" placeholder="Image">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input type="email" id="addcatId" class="form-control validate" placeholder="Category">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addsubcatId" class="form-control validate" placeholder="Subcategory">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input type="email" id="addnameId" class="form-control validate" placeholder="Product Name">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="adddesId" class="form-control validate" placeholder="Description">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input type="email" id="addsizeId" class="form-control validate" placeholder="Size">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addcolorId" class="form-control validate" placeholder="Color">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input type="email" id="addqtyId" class="form-control validate" placeholder="Quantity">
                            </div>
                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input type="text" id="addpriceId" class="form-control validate" placeholder="Price">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input type="email" id="addstatusId" class="form-control validate" placeholder="Status">
                            </div>




                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn btn-sm btn-danger">Cancel</button>
                            <button id="AddConfirmBtn" class="btn btn-sm btn-success">Save</button>
                        </div>
                    </div>
                </div>
            </div>


            @endsection


@section('script')
                <script type="text/javascript">
                    getProductsData();
                    function getProductsData() {
                        axios.get('/getProductsData')
                            .then(function(response) {

                                if (response.status == 200) {

                                    $('#mainDiv').removeClass('d-none');
                                    $('#loaderDiv').addClass('d-none');
                                    $('#productsDataTable').DataTable().destroy();
                                    $('#productsTable').empty();
                                    var jsonData = response.data;

                                    $.each(jsonData, function(i,v) {
                                        $('<tr>').html(

                                            "<td class='th-sm'><img class='table-img' src=" + jsonData[i].image + "></td>" +
                                            "<th>" + jsonData[i].category_id + "</th>" +
                                            "<td>" + jsonData[i].subcategory_id + "</td>" +
                                            "<td>" + jsonData[i].name + "</td>" +
                                            "<td>" + jsonData[i].description + "</td>" +
                                            "<td>" + jsonData[i].size + "</td>" +
                                            "<td>" + jsonData[i].colour + "</td>" +
                                            "<td>" + jsonData[i].quantity + "</td>" +
                                            "<td>" + jsonData[i].price + "</td>" +
                                            "<td>" + jsonData[i].status + "</td>" +
                                            "<td ><a class='productsEdit' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                                            "<td ><a class='productsDelete' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                                        ).appendTo('#productsTable');
                                    });

                                    $('.productsDelete').click(function() {
                                        var id = $(this).data('id');
                                        $('#DeleteId').html(id);

                                        $('#deleteModal').modal('show');

                                    });
                                    $('.productsEdit').click(function() {
                                        var id = $(this).data('id');
                                        $('#EditId').html(id);
                                        getUpdateDetails(id);
                                        $('#editModal').modal('show');

                                    });

                                    $('#categoryDataTable').DataTable({
                                        "order": false
                                    });
                                    $('.dataTables_length').addClass('bs-select')

                                } else {
                                    $('#loaderDiv').addClass('d-none');
                                    $('#WrongDiv').removeClass('d-none');
                                }


                            })
                            .catch(function(error) {
                                $('#loaderDiv').addClass('d-none');
                                $('#WrongDiv').removeClass('d-none');
                            })


                    }

                    $('#DeleteConfirmBtn').click(function() {

                        var id = $('#DeleteId').html();
                        deleteProductsData(id);

                    })


                    function deleteProductsData(deleteId) {
                        $('#DeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
                        axios.post('/deleteProductsData', {
                            id: deleteId
                        })

                            .then(function(response) {

                                if (response.status == 200) {
                                    if (response.data == 1) {
                                        $('#deleteModal').modal('hide');
                                        toastr.success('Delete Success');
                                        getProductsData();


                                    } else {
                                        $('#deleteModal').modal('hide');
                                        toastr.error('Delete Failed');
                                        getProductsData();


                                    }

                                } else {
                                    $('#deleteModal').modal('hide');
                                    toastr.error('Something Went wrong')


                                }

                            })
                            .catch(function(error) {

                                $('#deleteModal').modal('hide');
                                toastr.error('Something Went wrong')

                            })

                    }

                    function getUpdateDetails(detailsId) {

                        axios.post('/getProductsDetails', {
                            id: detailsId
                        })
                            .then(function(response) {

                                if (response.status == 200) {
                                    $('#EditForm').removeClass('d-none');
                                    $('#EditLoader').addClass('d-none');

                                    var jsonData = response.data;

                                    $('#imgId').val(jsonData[0].image);
                                    $('#catId').val(jsonData[0].category_id);
                                    $('#subcatId').val(jsonData[0].subcategory_id);
                                    $('#nameId').val(jsonData[0].name);
                                    $('#desId').val(jsonData[0].description);
                                    $('#sizeId').val(jsonData[0].size);
                                    $('#colorId').val(jsonData[0].colour);
                                    $('#qtyId').val(jsonData[0].quantity);
                                    $('#priceId').val(jsonData[0].price);
                                    $('#statusId').val(jsonData[0].status);


                                } else {


                                    $('#EditLoader').addClass('d-none');
                                    $('#EditWrong').removeClass('d-none');


                                }

                            })
                            .catch(function(error) {
                                $('#EditLoader').addClass('d-none');
                                $('#EditWrong').removeClass('d-none');
                            })



                    }

                    $('#EditConfirmBtn').click(function() {

                        var id = $('#EditId').html();
                        var image = $('#imgId').val();
                        var name = $('#nameId').val();
                        var cat = $('#catId').val();
                        var subcat = $('#subcatId').val();
                        var des = $('#desId').val();
                        var size = $('#sizeId').val();
                        var color = $('#colorId').val();
                        var qty = $('#qtyId').val();
                        var price = $('#priceId').val();
                        var status = $('#statusId').val();

                        updateDetails(id, image,name, cat,subcat,des,size,color,qty,price, status);

                    });

                    function updateDetails(id,image, name,category_id,subcategory_id,description,size,colour,quantity,price,status) {
                        if (image.length == 0) {
                            toastr.error('Image is empty');
                        } else if(category_id.length==0){
                            toastr.error('Category is empty');
                        }else if(subcategory_id.length==0){
                            toastr.error('Subcategory is empty');
                        }else if(name.length==0){
                            toastr.error('Product Name is empty');
                        }else if(description.length==0){
                            toastr.error('Description is empty');
                        }else if(size.length==0){
                            toastr.error('Size is empty');
                        }else if(colour.length==0){
                            toastr.error('Color is empty');
                        }else if(quantity.length==0){
                            toastr.error('Quantity is empty');
                        }else if(price.length==0){
                            toastr.error('Price is empty');
                        }

                        else {

                            $('#EditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                            var url = '/updateProductsDetails';
                            var detailsData = {
                                id: id,
                                image:image,
                                category_id:category_id,
                                subcategory_id:subcategory_id,
                                name: name,
                                description:description,
                                size:size,
                                colour:colour,
                                quantity:quantity,
                                price:price,
                                status: status
                            };
                            axios.post(url, detailsData)
                                .then(function(response) {

                                    $('#EditConfirmBtn').html('Save');

                                    if (response.status == 200) {
                                        if (response.data == 1) {

                                            $('#editModal').modal('hide');
                                            toastr.success("Update Success");
                                            getProductsData();
                                        } else {

                                            $('#editModal').modal('hide');
                                            toastr.error("Update Failed");
                                            getProductsData();

                                        }

                                    } else {
                                        $('#editModal').modal('hide');
                                        toastr.error("Something went wrong");

                                    }

                                })
                                .catch(function(error) {
                                    $('#editModal').modal('hide');
                                    toastr.error("Something went wrong");
                                })

                        }

                    }


                    $('#addNew').click(function() {

                        $('#addModal').modal('show');

                    });

                    $('#AddConfirmBtn').click(function() {


                        var image = $('#addimgId').val();
                        var name = $('#addnameId').val();
                        var cat = $('#addcatId').val();
                        var subcat = $('#addsubcatId').val();
                        var des = $('#adddesId').val();
                        var size = $('#addsizeId').val();
                        var color = $('#addcolorId').val();
                        var qty = $('#addqtyId').val();
                        var price = $('#addpriceId').val();
                        var status = $('#addstatusId').val();

                        insertDetails(image, name,cat,subcat,des,size,color,qty,price,status);

                    });

                    function insertDetails(image, name,category_id,subcategory_id,description,size,colour,quantity,price,status) {
                        if (image.length == 0) {
                            toastr.error('Image is empty');
                        } else if(category_id.length==0){
                            toastr.error('Category is empty');
                        }else if(subcategory_id.length==0){
                            toastr.error('Subcategory is empty');
                        }else if(name.length==0){
                            toastr.error('Peoduct Name is empty');
                        }else if(description.length==0){
                            toastr.error('Description is empty');
                        }else if(size.length==0){
                            toastr.error('Size is empty');
                        }else if(colour.length==0){
                            toastr.error('Color is empty');
                        }else if(quantity.length==0){
                            toastr.error('Quantity is empty');
                        }else if(price.length==0){
                            toastr.error('Price is empty');
                        }else if(status.length==0){
                            toastr.error('Status is empty');
                        } else {

                            $('#AddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
                            var url = '/insertProducts';
                            var detailsData = {
                                image:image,
                                category_id:category_id,
                                subcategory_id:subcategory_id,
                                name: name,
                                description:description,
                                size:size,
                                colour:colour,
                                quantity:quantity,
                                price:price,
                                status: status
                            };
                            axios.post(url, detailsData)
                                .then(function(response) {

                                    $('#AddConfirmBtn').html('Save');

                                    if (response.status == 200) {
                                        if (response.data == 1) {

                                            $('#addModal').modal('hide');
                                            toastr.success("Insert Success");
                                            getProductsData();
                                        } else {

                                            $('#addModal').modal('hide');
                                            toastr.error("Insert Failed");
                                            getProductsData();

                                        }

                                    } else {
                                        $('#addModal').modal('hide');
                                        toastr.error("Something went wrong");

                                    }

                                })
                                .catch(function(error) {
                                    $('#addModal').modal('hide');
                                    toastr.error("Something went wrong");
                                })

                        }

                    }


                </script>

@endsection
