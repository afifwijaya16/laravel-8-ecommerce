<div class="container">
    <div class="row mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url('/cart') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('cart')}}" class="btn btn-sm btn-dark"><i class="fa fa-arrow-left"></i> Back </a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6 mt-1">
            <h4>Payment Information</h4>
            <hr>
            <h6>for payments can be transferred via bank for: <strong>Rp. {{ number_format($total_price)}}</strong> </h6>
            <div class="media">
                <img src="{{ asset('assets/bri.png')}}" class="mr-3 img-fluid" width="60px" height="60px" alt="...">
                <div class="media-body">
                    <h5 class="mt-0">Bank BRI</h5>
                    <table>
                        <tr>
                            <td>Nomor Rekening</td>
                            <td>:</td>
                            <td>xxx-xxx-xxx-xxx</td>
                        </tr>
                        <tr>
                            <td>Atas Nama</td>
                            <td>:</td>
                            <td><strong>Empires And Allies</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-1">
            <h4>Shipping Information</h4>
            <hr>
            @if ($formCheckout)
            <form wire:submit.prevent="checkout">
                <div class="form-group">
                    <label>Name</label>
                    <input id="name" type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" wire:model="name" disabled placeholder="Please enter your name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea wire:model="address" class="form-control @error('address') is-invalid @enderror"></textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>No Phone</label>
                    <input id="no_phone" type="text" wire:model="no_phone" class="form-control @error('no_phone') is-invalid @enderror" wire:model="no_phone" placeholder="Please enter your No phone">
                    @error('no_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            </form>
            @else
            <!-- <button class="btn btn-dark btn-block" wire:click="$emit('payment', '{{ $snapToken }}')" id="pay-button"><i class="fa fa-arrow-right"></i> Submit </button> -->
            <button class="btn btn-dark btn-block"  wire:click="$emit('payment')" id="pay-button"><i class="fa fa-arrow-right"></i> Submit </button>
            <script type="text/javascript">
                window.livewire.on('payment', data => {
                    window.livewire.emit('emptyCart');
                    window.location.href = "/history";
                });
                // window.livewire.on('payment', function (snapToken) {
                //     snap.pay(snapToken, {
                //         // Optional
                //         onSuccess: function (result) {
                //             window.livewire.emit('emptyCart');
                //             window.location.href = "/history";
                //         },
                //         // Optional
                //         onPending: function (result) {
                //             window.livewire.emit('emptyCart');
                //             window.location.href = "/history";
                //         },
                //         // Optional
                //         onError: function (result) {
                //             window.livewire.emit('emptyCart');
                //             window.location.href = "/history";
                //         }
                //     });
                // });
            </script>
        @endif
        </div>
    </div>
</div>
