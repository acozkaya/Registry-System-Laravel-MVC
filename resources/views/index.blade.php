<!-- index.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page - List</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Date</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Registry Office</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($registries as $registry)
      @php
        $date=date('Y-m-d', $registry['date']);
        @endphp
      <tr>
        <td>{{$registry['id']}}</td>
        <td>{{$registry['name']}}</td>
        <td>{{$date}}</td>
        <td>{{$registry['email']}}</td>
        <td>{{$registry['number']}}</td>
        <td>{{$registry['office']}}</td>

        <td><a href="{{action('RegistryController@edit', $registry['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('RegistryController@destroy', $registry['id'])}}" method="post">
          <!--@csrf-->{{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
