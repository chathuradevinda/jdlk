@extends('layouts.window')
@section('content')
    <div class="container">
        <br>
        <h4 style="color: gray">Your Job Details</h4>
        <br>
        @foreach ($job_details as $item)
       <table class="table" style="font-size: 14px;height:auto">
            <tr>
                <th>Job ID</th>
                <td>{{$item->id}}</td>
            </tr>
            <tr>
                <th>Expertise in</th>
                <td>{{$item->exp}}</td>
            </tr>
            <tr>
                <th>Specification</th>
                <td>{{$item->spec}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{$item->status}}</td>
            </tr>
            <tr>
                <th>Job Posted on</th>
                <td>{{$item->created_at}}</td>
            </tr>
            <tr>
                <th>Remarks by the Supervisor</th>
                <td>{{$item->remarks}}</td>
            </tr>
        <table>        
        @endforeach

        <br>
        <h4 style="color: gray">Contact Details</h4>
        <br>
        @foreach ($job_details_contacts as $item_1)
        <table class="table" style="font-size: 14px;height:auto">
            <tr>
                <th>Job Posted By</th>
                <td>{{$item_1->first_name}} {{$item_1->last_name}} </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$item_1->email}}</td>
            </tr>
            <tr>
                <th>Poastal Code</th>
                <td>{{$item_1->poastal_code}}</td>
            </tr>
            <tr>
                <th>Contact No</th>
                <td>{{$item_1->contact_no}}</td>
            </tr>
        </table>
        @endforeach
        
        <br>
        <h4 style="color: gray">Tradeperson Details</h4>
        <br>
        @foreach ($job_details_tp as $item_2)
        <table class="table" style="font-size: 14px;height:auto">
            <tr>
                <th>Assigned Tradeperson</th>
                <td>{{$item_2->first_name}} {{$item_2->last_name}} </td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$item_2->email}}</td>
            </tr>
            <tr>
                <th>Telephone</th>
                <td>{{$item_2->residence}}</td>
            </tr>
            <tr>
                <th>Mobile 1</th>
                <td>{{$item_2->mobile_1}}</td>
            </tr>
            <tr>
                <th>Mobile 2</th>
                <td>{{$item_2->mobile_2}}</td>
            </tr>
            <tr>
                <th>Tradeperson Action</th>
                <td>{{$item_2->action}}</td>
            </tr>
            <tr>
                <th>Tradeperson Remarks</th>
                <td>{{$item_2->remarks}}</td>
            </tr>
            
        </table>
        @endforeach
        <br>
        <br>
    </div>


            
@endsection
