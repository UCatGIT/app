<!-- resources/views/members.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Member Form -->
    <form action="{{ url('members') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Member Name -->
        <div class="form-group">
            <label for="member" class="col-sm-3 control-label">Member</label>

            <div class="col-sm-6">
                <input type="text" name="firstName" id="member-firstName" class="form-control">
            </div>

            <div class="col-sm-6">
                <input type="text" name="lastName" id="member-lastName" class="form-control">
            </div>
        </div>

        <!-- Add Member Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Member
                    </button>
            </div>
        </div>
    </form>
</div>

@if (count($members) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Aktuelle Member
    </div>

    <div class="panel-body">
        <table class="table table-striped chore-table">

            <!-- Table Headings -->
            <thead>                
                <th>Vorname</th>
                <th>Nachname</th>
                <th>&nbsp;</th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($member as $member)
                <tr>
                    <!-- Member Name -->
                    <td class="table-text">
                        <div>{{ $member->name }}</div>
                    </td>

                    <!-- Delete Button -->
                    <td>
                        <form action="{{ url('member/'.$member->id) }}" method="POST">
                            {{ csrf_field() }} {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

@endsection
