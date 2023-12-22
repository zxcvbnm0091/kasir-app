@extends('layout/main')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Order Data</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Welcome to this page!</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Jumlah Pesanan :</div>
            </div>
        </div>
    </div>

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-warning mb-4 ml-1" data-toggle="modal" data-target="#myModal">
        Add new Order
    </button>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Order Data
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary" target="blank">View Order</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">
                                Delete
                            </button>
                        </td>
                    </tr>

                    <!-- modal delete -->
                    <div class="modal fade" id="delete">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Delete Order Data</h4>
                                    <button type="button" class="close" data-dismiss="modal">
                                        &times;
                                    </button>
                                </div>

                                <form method="post">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure want to delete this order data?
                                        <input type="hidden" name="ido" value="" />
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" name="deleteorder">
                                            Submit
                                        </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                            Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection