@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-white mt-5">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box card">
                <div class="card-body">
                    <h3 class="box-title pull-left">Member {{ $member->id }}</h3>
                    @can('view-'.str_slug('Member'))
                        <a class="btn btn-success pull-right" href="{{ url('/admin/member') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $member->id }}</td>
                            </tr>
                            <tr><th> Name </th><td> {{ $member->name }} </td></tr><tr><th> URL </th><td> {{ $member->URL }} </td></tr><tr><th> Detail </th><td> {{ $member->detail }} </td></tr>
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

