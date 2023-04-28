<title>{{ $title }}</title>
@extends('component.master')
@section('header')
@endsection
@section('content')
    <div class="container">
        <h3>All User List</h3>
        <div class="form-group">

            <a class="btn btn-info btn-sm" href="{{route('users.add')}}">Add User</a>

        </div>
        <div class="table-responsive">


            <table id="mytable" class="table table-bordred table-striped">

                <thead>

                    <th><input type="checkbox" id="checkall" /></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @if(count($users))
                    @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox" class="checkthis" name="check[]" value="{{$user->id}}"/></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->status==1)
                        <td>On</td>
                        @else
                        <td>Off</td>
                        @endif
                        <td>

                            <a href="{{route('users.edit',$user->id)}}" type="button"   class="btn btn-primary btn-sm" data-title="Edit">Edit</a>

                            <a href="{{route('user.destroy',$user->id)}}" type="button"  class="btn btn-danger btn-sm" data-title="Delete" >Delete</a>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <h3>No Data Found</h3>
                    @endif
                </tbody>

            </table>

            <div class="clearfix"></div>
        </div>
    @endsection
    @section('footer')
     <script>
        $(document).ready(function(){
        $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(':checked')) {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });
        </script>
    @endsection
