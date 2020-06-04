
@extends('Layout.app')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <ol class="breadcrumb mt-4">
                    <li class="breadcrumb-item active">Visitors</li>
                </ol>


                <div class="row">
                    <div class="col-md-12 p-5">
                        <table id="VisitorDt" class="table table-striped table-sm table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th class="th-sm">NO</th>
                                <th class="th-sm">IP</th>
                                <th class="th-sm">Date & Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($visitorData as $visitor)
                                <tr>
                                    <th class="th-sm">{{$visitor->id}}</th>
                                    <th class="th-sm">{{$visitor->ip_address}}</th>
                                    <th class="th-sm">{{$visitor->visit_time}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

        </main>

   @endsection


@section('script')
    <script type="text/javascript">


        $(document).ready(function() {
            $('#VisitorDt').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });

    </script>

@endsection
