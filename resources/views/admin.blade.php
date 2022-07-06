<!doctype html>
<html lang="en">
<head>
    @include('head')
    <script type="text/javascript" src="{{secure_asset('js/admin.js')}}" defer></script>
</head>
<body>
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <div class="mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                        <p class="text-white-50 mb-5">Please enter your login and password!</p>
                        <form action="/admin" method="post" class="adminForm form-outline form-white mb-4">
                            @csrf
                            <label class="form-label" for="typeEmailX">LogIn</label>
                            <br>
                            <input type="text" id="text"  name="name" class="form-control form-control-lg" />
                            <br>
                            <div class="passDiv">
                                <label class="form-label" for="typePasswordX">Password</label>
                                <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                <i class="bi bi-eye-slash" id="togglePassword"></i>
                            </div>
                            <br>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                        </form>
                        @if(Session::get('msg'))
                            <h4>{{Session::get('msg')}}</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
</body>
</html>
