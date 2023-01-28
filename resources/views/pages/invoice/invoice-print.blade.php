<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Invoice Print</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('invoice/css/adminlte.min.css')}}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice ">
    <!-- title row -->

    <!-- info row -->
    <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
            <img src="{{asset('storage/img/logo.png')}}" class="w-10" alt="">
            <h4>
                <i class="fas fa-globe"></i> UKZChema
                <small class="float-right">Date: {{$invoice->invoice_date}}</small>
              </h4>
          </div>
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong>UKZChema</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (804) 123-5432<br>
                Email: accounts@ukzchema.co.uk
            </address>
        </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
            <strong>{{$invoice->member->full_name}}</strong><br>
            {{$invoice->member->nok_street}}<br>
            {{$invoice->member->city}}<br>
            {{$invoice->member->country}}<br>
            Phone: {{$invoice->member->phone}}<br>
            Email: {{$invoice->member->email}}
        </address>
        </div>
      <!-- /.col -->
        <div class="col-sm-4 invoice-col">
            <b>Invoice #{{$invoice->id}}</b><br>

            {{-- <b>Order ID:</b> 4F3S8J<br> --}}
            <b>Payment Due: {{explode(',',$invoice->due_date)[0]}}</b><br>
            <b>Account:</b>
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
        <div class="row">
            <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                <th>Qty</th>
                <th>Description</th>
                <th>Subtotal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoice->invoice_items as $item)
                    <tr>
                        @if ($item->units)
                            <td>{{$item->units}}</td>
                        @else
                            <td>1</td>
                        @endif
                        <td>{{$item->title}}</td>
                        <td>{{$item->amount}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            <!-- /.col -->
        </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="{{asset('invoice/img/credit/visa.png')}}" alt="Visa">
        <img src="{{asset('invoice/img/credit/mastercard.png')}}" alt="Mastercard">
        <img src="{{asset('invoice/img/credit/paypal2.png')}}" alt="American Express">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Please make payment before due date.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Amount Due: </p>

          <div class="table-responsive">
            <table class="table">
            <tr>
                <th style="width:50%">Subtotal:</th>
                <td>${{$invoice->subtotal}}</td>
            </tr>
            {{-- <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
            </tr> --}}
            {{-- <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
            </tr> --}}
            <tr>
                <th>Total:</th>
                <td>${{$invoice->total}}</td>
            </tr>
            </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
