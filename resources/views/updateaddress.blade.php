@extends('layouts.user')


@section('content')
<div class="w-50 mx-auto" >
    <form action="{{ route('shipping_address.update', $shipping_address->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="singin-email-2">City</label>
            <input type="text" class="form-control" id="singin-email-2" name="city" value="{{ $shipping_address->city }}"
                required>
            @if ($errors->has('city'))
                <p class="text-danger">{{ $errors->first('city') }}</p>
            @endif
        </div><!-- End .form-group -->
    
        <div class="form-group">
            <label for="postalcode">Postal code</label>
            <input type="number" class="form-control" id="postalcode" value="{{ $shipping_address->postal_code }}"
                name="postal_code" required>
                @if ($errors->has('postalcode'))
                <p class="text-danger">{{ $errors->first('postalcode') }}</p>
            @endif
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="shipment_address">Shipment address</label>
            <input type="text" class="form-control" id="shipment_address" value="{{ $shipping_address->shipment_address }}"
                name="shipment_address" required>
                @if ($errors->has('shipment_address'))
                <p class="text-danger">{{ $errors->first('shipment_address') }}</p>
            @endif
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" class="form-control" id="contact" value="{{ $shipping_address->contact }}"
                name="contact" required>
                @if ($errors->has('contact'))
                <p class="text-danger">{{ $errors->first('contact') }}</p>
            @endif
        </div><!-- End .form-group -->

        <div class="form-group">
            <label for="notes">notes</label>
            <input type="text" class="form-control" id="notes" value="{{ $shipping_address->notes }}"
                name="notes" required>
                @if ($errors->has('notes'))
                <p class="text-danger">{{ $errors->first('notes') }}</p>
            @endif
        </div><!-- End .form-group -->
    
        <div class="form-footer">
            <button type="submit" class="btn btn-outline-primary-2">
                <span>Edit Address</span>
                <i class="icon-long-arrow-right"></i>
            </button>
            
        </div><!-- End .form-footer -->
    </form>
</div>


@endsection
