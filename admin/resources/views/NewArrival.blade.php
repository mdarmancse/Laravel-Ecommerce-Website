@extends('Layout.app')

@section('title','New Arrival')


@section('content')

    <!-----Table--->
    <div id="layoutSidenav_content">

        <div class="container-fluid">
            <ol class="breadcrumb mt-4">
                <li class="breadcrumb-item active">New Arrival</li>
            </ol>
            <div class="row">
                <div id="mainDiv" class="col-md-12 p-5 d-none">
                    <button id="addNew" type="button" class=" btn btn-sm btn-danger">Add New Product</button>
                    <table id="arrivalDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th class="th-sm">Image</th>
                            <th class="th-sm">Description</th>
                            <th class="th-sm">Price</th>
                            <th class="th-sm">Edit</th>
                            <th class="th-sm">Delete</th>
                        </tr>
                        </thead>
                        <tbody id="arrivaLtable">


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

                                    <i class="fas fa-tshirt prefix grey-text"></i>
                                    <input type="text" id="imageId" class="form-control validate" placeholder="Image">
                                </div>

                                <div class="md-form mb-5">
                                    <i class="fas fa-info-circle prefix grey-text"></i>
                                    <input type="text" id="desId" class="form-control validate" placeholder="Description">
                                </div>

                                <div class="md-form mb-5">

                                    <i class="fas fa-tags prefix grey-text"></i>
                                    <input type="email" id="priceId" class="form-control validate" placeholder="Price">
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
                            <h4 class="modal-title w-100 font-weight-bold">Add New Product</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="md-form mb-5">
                                <i class="fas fa-tshirt prefix grey-text"></i>
                                <input placeholder="Product Image" type="text" id="addImageId" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-info-circle prefix grey-text"></i>
                                <input placeholder="Description" type="text" id="addDesId" class="form-control validate">
                            </div>

                            <div class="md-form mb-5">
                                <i class="fas fa-tags prefix grey-text"></i>
                                <input placeholder="Price" type="text" id="addPriceId" class="form-control validate">
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

    getArrivalData();
    function getArrivalData() {
        axios.get('/getArrivalData')
            .then(function(response) {

                if (response.status == 200) {

                    $('#mainDiv').removeClass('d-none');
                    $('#loaderDiv').addClass('d-none');
                    $('#arrivalDataTable').DataTable().destroy();
                    $('#arrivaLtable').empty();
                    var jsonData = response.data;

                    $.each(jsonData, function(i,v) {
                        $('<tr>').html(

                            "<td class='th-sm'><img class='table-img' src=" + jsonData[i].image + "></td>" +
                            "<th>" + jsonData[i].description + "</th>" +
                            "<td>" + jsonData[i].price + "</td>" +
                            "<td ><a class='arrivalEdit' data-id=" + jsonData[i].id + "><i class='fas fa-edit'></i></a></td>" +
                            "<td ><a class='arrivalDelete' data-id=" + jsonData[i].id + "><i class='fas fa-trash-alt'></i></a></td>"

                        ).appendTo('#arrivaLtable');
                    });

                    $('.arrivalDelete').click(function() {
                        var id = $(this).data('id');
                        $('#DeleteId').html(id);

                        $('#deleteModal').modal('show');

                    });
                    $('.arrivalEdit').click(function() {
                        var id = $(this).data('id');
                        $('#EditId').html(id);
                        getUpdateDetails(id);
                        $('#editModal').modal('show');

                    });

                    $('#arrivalDataTable').DataTable({
                        "order": false
                    })
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
        deleteArrivalData(id);

    })


    function deleteArrivalData(deleteId) {
        $('#DeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/deleteArrivalData', {
            id: deleteId
        })

            .then(function(response) {

                if (response.status == 200) {
                    if (response.data == 1) {
                        $('#deleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getArrivalData();


                    } else {
                        $('#deleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getArrivalData();


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

        axios.post('/getDetails', {
            id: detailsId
        })
            .then(function(response) {

                if (response.status == 200) {
                    $('#EditForm').removeClass('d-none');
                    $('#EditLoader').addClass('d-none');

                    var jsonData = response.data;

                    $('#imageId').val(jsonData[0].image);
                    $('#desId').val(jsonData[0].description);
                    $('#priceId').val(jsonData[0].price);

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
        var image = $('#imageId').val();
        var des = $('#desId').val();
        var price = $('#priceId').val();
        updateDetails(id, image, des, price);

    });

    function updateDetails(id, image, description, price) {
        if (image.length == 0) {
            toastr.error('Image is empty');
        } else if (description.length == 0) {
            toastr.error('Description is empty');
        } else if (price.length == 0) {
            toastr.error('Price is empty');
        } else {

            $('#EditConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
            var url = '/updateDetails';
            var detailsData = {
                id: id,
                image: image,
                description: description,
                price: price
            };
            axios.post(url, detailsData)
                .then(function(response) {

                    $('#EditConfirmBtn').html('Save');

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#editModal').modal('hide');
                            toastr.success("Update Success");
                            getArrivalData();
                        } else {

                            $('#editModal').modal('hide');
                            toastr.error("Update Failed");
                            getArrivalData();

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

        var image = $('#addImageId').val();
        var des = $('#addDesId').val();
        var price = $('#addPriceId').val();
        insertDetails(image, des, price);

    });

    function insertDetails(image, description, price) {
        if (image.length == 0) {
            toastr.error('Image is empty');
        } else if (description.length == 0) {
            toastr.error('Description is empty');
        } else if (price.length == 0) {
            toastr.error('Price is empty');
        } else {

            $('#AddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>")
            var url = '/insertProduct';
            var detailsData = {
                image: image,
                description: description,
                price: price
            };
            axios.post(url, detailsData)
                .then(function(response) {

                    $('#AddConfirmBtn').html('Save');

                    if (response.status == 200) {
                        if (response.data == 1) {

                            $('#addModal').modal('hide');
                            toastr.success("Insert Success");
                            getArrivalData();
                        } else {

                            $('#addModal').modal('hide');
                            toastr.error("Insert Failed");
                            getArrivalData();

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
