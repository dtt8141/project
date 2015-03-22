<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $data as $datum )
        <tr>
            <td>{{$datum->id}}</td>
            <td>{{$datum->name}}</td>
            <td>{{$datum->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>