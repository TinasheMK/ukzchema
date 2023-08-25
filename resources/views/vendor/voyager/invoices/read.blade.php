@extends('voyager::master')

@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .mt-1{
        margin-top: 0.2rem;
    }
    .info-title{
        font-weight: bold;
    }
</style>
{{-- <link rel="stylesheet" href="{{asset('invoice/css/adminlte.min.css')}}"> --}}
@stop

@section('page_title', "UKZ - Review ".$dataType->display_name_singular)



@php
    $invoice = $dataTypeContent;
@endphp


@section('content')
<div class="page-content edit-add container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    {{-- <h4 class="panel-title info-title">Invoice</h4> --}}
                    {{-- <hr style="margin:0;"> --}}
                    <div class="wrapper">

                        <!-- Content Wrapper. Contains page content -->
                        <div class=" mx-5">
                          <!-- Content Header (Page header) -->
                          <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6 mt-4">
                                  <h1>Invoice #{{$invoice->id}}</h1>
                                </div>
                              </div>
                            </div><!-- /.container-fluid -->
                          </section>

                          <section class="content ">
                            <div class="container-fluid">
                              <div class="row">
                                <div class="col-12">


                                  <!-- Main content -->
                                  <div class="invoice p-3 mb-3">
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                      <div class="col-sm-12 invoice-col">

                                          <h4>
                                            <img src="{{asset('storage/img/logo.png')}}" style="width:200px" alt="UKZChema">
                                            {{-- <i class="fas fa-globe"></i> UKZChema --}}
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
                                        <b>Account: </b>
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

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                      <div class="col-12">
                                        <a href="{{route('invoice-print', $invoice->id)}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        {{-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                          Payment
                                        </button>
                                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                          <i class="fas fa-download"></i> Generate PDF --}}
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- /.invoice -->
                                </div><!-- /.col -->
                              </div><!-- /.row -->
                            </div><!-- /.container-fluid -->
                          </section>
                          <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->


                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                          <!-- Control sidebar content goes here -->
                        </aside>
                        <!-- /.control-sidebar -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
