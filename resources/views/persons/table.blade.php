<div class="table-responsive-sm">
    <table class="table table-striped" id="people-table">
        <thead>
            <tr>
                <th>First Name</th>
        <th>Last Name</th>
        <th>Middle Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($people as $person)
            <tr>
                <td>{{ $person->first_name }}</td>
            <td>{{ $person->last_name }}</td>
            <td>{{ $person->middle_name }}</td>
                <td>
                    {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('people.show', [$person->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('people.edit', [$person->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>