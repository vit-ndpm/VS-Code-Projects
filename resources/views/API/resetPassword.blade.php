<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset Request Online Exam System Narmadapuram MP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row m-5">
            <div class="col-6 offset-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Password Reset Form</h3>
                        <p><b>{{ $user[0]->name }}</b><span> ({{ $user[0]->email }})</span></p>


                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user[0]->id }}" />


                            <div class="mb-3 ">
                                <input class="form-control" type="password" name="password"
                                    placeholder="Enter new Password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Confirm new Password" />
                                    @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit"
                                    class="form-control btn btn-success btn-xl"value="Reset Password" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
