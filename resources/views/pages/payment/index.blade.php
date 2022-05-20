@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Payment Settings</h3>

        <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('payment.create') }}"><i class="fas fa-plus-circle"></i>
                        Add Payment</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="card-body">

        @if(session()->has('message'))

        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ session()->get('message') }}
        </div>
        @endif
        @if(session()->has('message_update'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Alert!</h5>
            {{ session()->get('message_update') }}
        </div>
        @endif
        <table id="tbl_payment" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Payer Email</th>
                    <th>Amount</th>
                    <th>Method</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payment as $key => $payments )
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$payments->user->name}}</td>
                    <td>{{$payments->user->email}}</td>
                    <td>{{$payments->pricing->price}}</td>
                    <td>{{$payments->payment_method}}</td>
                    <td>
                        @if($payments->status == 'success')
                        <span class="text-success" data-toggle="tooltip" title="{{$payments->status}}"><i
                                class="fa fa-check-circle"></i> </span>
                        @else
                        <span class="text-danger" data-toggle="tooltip" title="{{$payments->status}}"><i
                                class="fa fa-exclamation-circle"></i> </span>
                        @endif
                    </td>
                    <td>

                        <div class="btn-group">
                            <button type="button" class="btn btn-warning">Action</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon"
                                data-toggle="dropdown" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                                <a name="edit" class="dropdown-item"
                                    href="{{url('payment/'.$payments->id.'/edit')}}">Edit</a>
                                <a onclick="event.preventDefault();
                                    document.getElementById('delete-form-{{$payments->id }}').submit();"
                                    class="dropdown-item"
                                    href="{{ route('pricing.destroy',[$payments->id]) }}">Delete</a>
                                <form id="delete-form-{{ $payments->id }}"
                                    action="{{ route('payment.destroy',[$payments->id]) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
    @endsection
    @section('scripts')
    <script type="text/javascript">
        $("#tbl_payment").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#tbl_payment_wrapper .col-md-6:eq(0)');
    </script>
@endsection
