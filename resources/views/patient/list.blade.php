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
                    <h2>List Patient</h2>
                    <div class="clearfix"></div>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Age</th>
                            <th>Address</th>
                            <th>Aadhar No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $key=>$patient)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{$patient->first_name}}</td>
                                <td>{{$patient->last_name}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->phone}}</td>
                                <td>{{$patient->age}}</td>
                                <td>{{$patient->address}}</td>
                                <td>{{$patient->aadhar_no}}</td>
                                <td>
                                    <a href="{{url('patient/edit/'.$patient->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-danger" id="delete_patient" data-patient_id="{{$patient->id}}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {{ $patients->links() }}
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
        $(document).on('click','#delete_patient',function(){
            var patient_id = $(this).data('patient_id');
            var $this = $(this);
            $.ajax({
                type:'POST',
                url: "{{route('patient.delete')}}",
                data: {patient_id:patient_id },
                success:function( response ){
                    $this.parents('tr').remove();
                    toastr.success(response.message);
                }
            });
        })
    </script>
@endpush