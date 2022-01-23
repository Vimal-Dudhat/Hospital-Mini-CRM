@extends('layouts.dashboard')

@section('content')
<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                <div class="x_title">
                    <h2>List Doctor</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Visit Date Time</th>
                            <th>Fees</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $key=>$doctor)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$doctor->first_name}}</td>
                                <td>{{$doctor->last_name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->department}}</td>
                                <td>{{$doctor->visit_day_time}}</td>
                                <td>{{$doctor->fees}}</td>
                                <td>
                                    <a href="{{url('doctor/edit/'.$doctor->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete_doc" data-doc_id="{{$doctor->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $doctors->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).on('click','#delete_doc',function(){
            var doc_id = $(this).data('doc_id');
            var $this = $(this);
            $.ajax({
                type:'POST',
                url: "{{route('doctor.delete')}}",
                data: {doc_id:doc_id },
                success:function( response ){
                    $this.parents('tr').remove();
                    toastr.success(response.message);
                }
            });
        })
    </script>
@endpush