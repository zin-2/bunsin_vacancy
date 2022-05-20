@extends('layouts.app', [
'class' => '',
'elementActive' => 'contact'
])

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fab fa-cat-space"></i>Payment Settings</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <form name="add-category" id="add-blog-post-form" method="post" action="{{route('payment.update',[$payment->id])}}">
            @csrf
            @method('PATCH')
            <div class="form-group">
                        <label>Package Name  <span class="text-danger">*</span></label>
                        <select id="package_id" name="package_id" class="form-control">
                            <option value="">-- Select Package  --</option>
                            @foreach ($pricing as $pricings )
                                <option value="{{ $pricings->id }}" {{ $payment->pricing->id == $pricings->id ? "selected" : " " }}>{{ $pricings->package_name }}</option>
                            @endforeach
                        </select>
                        <i id="result"><i>
                </div>
             <div class="form-group">
                        <label>Choose your gateway  <span class="text-danger">*</span></label>
                        <select name="gateway" id="gateway" class="form-control">
                            <option value="">-- Choose your gateway --</option>
                                <option value="PayPal" {{ $payment->payment_method == "PayPal" ? "selected":"" }}> PayPal</option>
                        </select>
                    </div>
    </div>
    <div class="card-footer">
       
        <a class="btn btn-default" href="{{ url()->previous() }}">Back</a>
         <button type="submit" class="btn btn-primary">Save</button>
    </div>
    <!-- /.card-body -->
    </form>
    <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section('scripts')
<script type="text/javascript">

//Date picker
   
    //Date and time picker
    $(document).ready(function() {
        $('#package_id').on('change', function() {
            var id = $('#package_id').val();
            if(id == 1 || id == 2 ){
                        $.ajax({
                    url: "{{url('payment')}}" + '/' + id
                    , type: "GET"
                    , data: {
                        id: id
                        , _token: '{{csrf_token()}}'
                    }
                    , dataType: 'json'
                    , success: function(res) {
                        $('#result').show();
                        $('#result').html('<i style="color:red">' + res.message.package_name + '<strong style="color:red;"> - </strong> ' + res.message.price + ' USD'+ ' Available Job ' + res.message.preminum_job + '</i>');
                        //console.log(res.message.id);
                    }
                    , error: function(err) {
                        console.log(err);
                    }
                });
            }else{
                //console.log("heid");
                $('#result').hide();
                // $('#add-blog-post-form').trigger('reset');
            }
          
            
        });
    });
</script>
@endsection