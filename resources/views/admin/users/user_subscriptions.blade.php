@extends('admin.layouts.app')

@section('content')
    <!-- Breadcrumbs-->
    <div class="bg-white border-bottom py-3 mb-5">
        <div
            class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
            <nav class="mb-0" aria-label="breadcrumb">
                <h3 class="m-0">All Subscribe</h3>

            </nav>
            <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="./">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Subscribe</li>
                </ol>
            </div>
        </div>
    </div> <!-- / Breadcrumbs-->

    <section class="container-fluid">

        <div class="card">
            <div class="card-header">
                @include('admin.common.alerts')
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{route('subscribes.export')}}"><button class="btn btn-primary btn-sm" type="button" onClick="downloadSubscriptions()"> <i class="fa fa-download"></i> Download </button></a>
                    </div>
                    <div class="col-md-6" style="float:right;">
                        <form action="{{ route('subscribes.all') }}" method="get">
                            <div class="input-group">
                                <input type="search" class="form-control" name="searchKey"
                                    placeholder="Subscribe Email " value="{{ $searchKey }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <div class="card-body">
                <div class="row overflow-auto">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    
                                    <th>Email</th>
                                    <th>Created Date</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($subscriptions as $subscription)
                                    <tr>
                                        
                                        <td>{{ $subscription->email }}</td>
                                        <td>{{ $subscription->created_at }}</td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <div class="d-felx justify-content-center">

                    {{ $subscriptions->links() }}

                </div>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    </div>
    </div>
@endsection
