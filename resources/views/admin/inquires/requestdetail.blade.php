@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Inquiry </h3>
                    
                        <a class="btn btn-success pull-right" href="{{ url('/admin/contact/inquiries') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $request->id }}</td>
                            </tr>
                            <tr><th> Name </th>
							<td> {{ $request->name }} </td>
							</tr>
							<tr><th> Email </th>
							<td> {{ $request->email }} </td>
							</tr>
							<tr><th> Phone </th>
							<td> {{ $request->phone }} </td>
							</tr>
							<tr><th> Message </th><td> {{ $request->message }} </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.admin.footer')
</div>
@endsection

