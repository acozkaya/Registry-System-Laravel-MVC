<!-- edit.blade.php -->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit </title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
      <h2>Edit Form</h2><br  />
        <form method="post" action="{{action('RegistryController@update', $id)}}">
        <!--@csrf --> {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$registry->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="{{$registry->email}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="number">Phone Number:</label>
              <input type="text" class="form-control" name="number" value="{{$registry->number}}">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4" style="margin-left:38px">
                <lable>Registry Office</lable>
                <select name="office">
                  <option value="Paris"  @if($registry->office=="Paris") selected @endif>Paris</option>
                  <option value="London"  @if($registry->office=="London") selected @endif>London</option>
                  <option value="Roma" @if($registry->office=="Roma") selected @endif>Roma</option>
                  <option value="Istanbul" @if($registry->office=="Istanbul") selected @endif>Istanbul</option>
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
