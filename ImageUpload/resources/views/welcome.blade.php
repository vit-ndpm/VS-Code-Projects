<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg">

                <H1 class=" d-flex justify-content-center bg-warning p-2">Image Upload</H1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card shadow m-3 p-3">
                    <form action="{{ url('save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name')
                                   is-invalid  @enderror"
                                placeholder="name" value="{{ old('name') }}" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Enter your name</small>
                            @error('name')
                                <p class=" text-danger" role="alert">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email"></label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email')is-invalid @enderror" placeholder="Enter Email"
                                aria-describedby="helpId" value="{{ old('email') }}">
                            <small id="helpId" class="text-muted">Enter your Email</small>
                            @error('email')
                            <p class=" text-danger" role="alert">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="mobile"></label>
                            <input type="number" name="mobile" id="mobile"
                                class="form-control @error('mobile')is-invalid @enderror" placeholder="Enter Mobile"
                                aria-describedby="helpId" value="{{ old('mobile') }}">
                            <small id="helpId" class="text-muted">Enter your Mobile</small>
                            @error('mobile')
                            <p class=" text-danger" role="alert">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="file"></label>
                            <input type="file" name="file" id="file" class="form-control" placeholder=""
                                aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Upload Image</small>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <table class="table">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Photo</th>
                            <th>created on</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($data)
                            @foreach ($data as $dat)
                                <tr>
                                    <td><img src="/img/uploads/{{ $dat->img }}" /></td>
                                    <td>{{ $dat->id }}</td>
                                    <td>{{ $dat->name }}</td>
                                    <td>{{ $dat->email }}</td>
                                    <td>{{ $dat->mobile }}</td>
                                    <td>{{ $dat->created_at }}</td>
                                    <td><a class="btn btn-primary" href="{{ url('edit') }}/{{ $dat->id }}">Edit</a>
                                    </td>
                                    <td><a class="btn btn-danger"
                                            href="{{ url('delete') }}/{{ $dat->id }}">Delete</a></td>
                                </tr>
                            @endforeach
                        @endisset
                        {{-- @foreach ($records as $record) --}}

                        {{-- @endforeach --}}



                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>
