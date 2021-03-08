<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Members & Genders</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <section class="container mt-5">
        {{-- add a gender --}}
    <form action="/genders" method="POST">
        @csrf
        <div class="form-group">
          <label>Gender</label>
          <input type="text" class="form-control"  placeholder="example: man" name="gender">
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
    {{-- add a member --}}
    <form action="/members" method="POST" class="mt-5">
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" placeholder="name" name="name">
        </div>
        <div class="form-group">
          <label>Select Gender</label>
          <select class="form-control" name="gender_id">
              @foreach ($genders as $gender)
                <option value="{{$gender->id}}">{{$gender->gender}}</option>
              @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    </section>
    <hr>
    <section class="container mt-5">
        {{-- all members and their genders --}}
        <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                    <tr>
                    <th scope="row">{{$member->id}}</th>
                    <td>{{$member->name}}</td>
                    <td>{{$member->genders->gender}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        {{-- members by gender --}}
        <table class="table table-warning mt-5">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Gender</th>
                <th scope="col">People</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($genders as $gender)
                    <tr>
                    <th scope="row">{{$gender->id}}</th>
                    <td>{{$gender->gender}}</td>
                    <td>
                        @foreach ($gender->members as $member_by_gender)
                            <p>{{$member_by_gender->name}}</p>
                        @endforeach
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </section>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>