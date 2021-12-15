@extends('layout.main')

@section('content')

    <div class="section-body">
        <div class="section-body">

            <div class="row mt-4">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <h4>System Setting</h4>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class=" card">
                        <div class="card-header">
                            <h4>Backups</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    @endsection
