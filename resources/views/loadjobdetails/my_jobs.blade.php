@extends('layouts.app')

@section('content')
<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );        
    </script>

    <br><br>
    <div class="container" style="height: 100%">
        @if (count($job_details)>0)
            <table class="table table-hover table-responsive-sm" id="table_id">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Job</th>
                    <th>Job Specification</th>
                    <th>Status</th>
                    <th>Posted Date</th>
                    <th>More Details</th>
                </tr>
            </thead>
            @foreach ($job_details as $job_detail)
                <tr>
                    <td>
                        <p style="color: gray">{{$job_detail->id}}</p>
                    </td>
                    <td>
                        <p style="color: gray">{{$job_detail->exp}}</p>
                    </td>
                    <td>
                        <p style="color: gray">{{$job_detail->spec}}</p>
                    </td>
                    <td>
                        <p style="color: gray">{{$job_detail->status}}</p>
                    </td>
                    <td>
                        <p style="color: gray">{{$job_detail->created_at}}</p>
                    </td>
                    <td>
                        @if ($job_detail->status==='completed')
                        <a href="/jobdone/public/feedback/{{$job_detail->id}}/edit" class="btn btn-outline-info btn-sm" onclick="window.open(this.href, 'mywin',
                            'left=20,top=20,width=600,height=600,toolbar=1,resizable=0'); return false;" >Feedback  <i class='fas fa-angle-right'></i></a>        
                        @else
                    <a href="/jobdone/public/feedback/{{$job_detail->id}}/my_jobs_more_info" class="btn btn-outline-info btn-sm" onclick="window.open(this.href, 'mywin',
                            'left=20,top=20,width=600,height=600,toolbar=1,resizable=0'); return false;" >More Details  <i class='fas fa-angle-right'></i></a>                     
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        @else   
            <br>     
            <p>No records found.</p>    
        @endif
    </div> 
    <br><br><br>

@endsection




