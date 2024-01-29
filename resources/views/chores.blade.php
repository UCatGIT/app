<!-- resources/views/chores.blade.php -->

@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
    <!-- Display Validation Errors -->
    @include('common.errors')

    <!-- New Chore Form -->
    <form action="{{ url('chore') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Chore Name -->
        <div class="form-group">
            <label for="chore" class="col-sm-3 control-label">Chore</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="chore-name" class="form-control">
            </div>
        </div>

        <!-- Add Chore Button -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Chore
                    </button>
            </div>
        </div>
    </form>
</div>

@if (count($chores) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Current Chores
    </div>

    <div class="panel-body">
        <table class="table table-striped chore-table">

            <!-- Table Headings -->
            <thead>
                <th>Chore</th>
                <th>&nbsp;</th>
            </thead>

            <!-- Table Body -->
            <tbody>
                @foreach ($chores as $chore)
                <tr>
                    <!-- Chore Name -->
                    <td class="table-text">
                        <div>{{ $chore->name }}</div>
                    </td>

                    <!-- Delete Button -->
                    <td>
                        <form action="{{ url('chore/'.$chore->id) }}" method="POST">
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
