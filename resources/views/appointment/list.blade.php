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
                    <h2>List Appointment</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Doctor</th>
                            <th>Patient</th>
                            <th>Appointment Date Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $key=>$appointment)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$appointment->doctor->first_name}} {{$appointment->doctor->last_name}}</td>
                                <td>{{$appointment->patient->first_name}} {{$appointment->patient->last_name}}</td>
                                <td>{{$appointment->appointment_date_time}}</td>
                                <td>
                                    <a href="{{url('appointment/edit/'.$appointment->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete_appointment" data-appointment_id="{{$appointment->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $appointments->links() }}
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
        $(document).on('click','#delete_appointment',function(){
            var appointment_id = $(this).data('appointment_id');
            var $this = $(this);
            $.ajax({
                type:'POST',
                url: "{{route('appointment.delete')}}",
                data: {appointment_id:appointment_id },
                success:function( response ){
                    $this.parents('tr').remove();
                    toastr.success(response.message);
                }
            });
        })
    </script>
@endpush