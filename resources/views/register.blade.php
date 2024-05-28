<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rental Buku | Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>

    <style>
        .main {
            height: 100vh;
            box-sizing: border-box;
        }

        .login-box {
            width: 500px;
            border: solid 1px;
        }
    </style>

    <body>
        
        <div class="main d-flex justify-content-center  align-items-center">
            
            <div class="login-box p-4">
                <h1>Sign Up</h1>
                <form action="#" method="post">
                    @csrf
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error ('name') is-invalid  @enderror" required value="{{old('name')}}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control @error ('username') is-invalid  @enderror" required value="{{old('username')}}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error ('email') is-invalid  @enderror" required value="{{old('email')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control @error ('phone') is-invalid  @enderror" required value="{{old('phone')}}">
                        @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="address" class="form-label">Address</label>
                        <textarea type="text" name="address" id="address" class="form-control @error ('address') is-invalid  @enderror" required value="{{old('address')}}"> </textarea>
                        @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error ('password') is-invalid  @enderror" required >
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mt-3 form-control">Sign Up</button>
                    </div>
                    <div class="text-center mt-3">
                        <p>Have account?<a href="/login" class="small text-decoration-none"> Sign In</a></p>
                    </div>
                </form>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>