<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <link rel="shortcut icon" type="image/png" href="{{ asset('asset/img/logo-upt.png') }}" />
    <meta name="author" content="UPT BLP2TK Surabaya" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="Login Admin UPT BLP2TK Surabaya" />
    <title>UPT BLP2TK | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center mt-5 mb-3">
                        <img src="{{ asset('asset/img/logo-upt.png') }}" alt="UPT BLP2TK" width="80"
                            onerror="this.style.display='none'" />
                        <h5 class="mt-2 fw-bold text-primary" style="font-size:14px; line-height:1.4;">
                            UPT Balai Latihan Pengembangan<br>Produktivitas Tenaga Kerja Surabaya
                        </h5>
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login Admin</h1>
                            <form method="POST" action="{{ route('login-validate') }}" class="needs-validation">
                                @csrf
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail </label>
                                    <input id="email" type="email" name="email" class="form-control"
                                        name="email" value="" required autofocus />
                                    <div class="invalid-feedback">Email is invalid</div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input id="password" type="password" name="password" class="form-control"
                                        name="password" required />
                                    <div class="invalid-feedback">Password is required</div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5 mb-3 text-muted">
                Copyright &copy; 2026 &mdash; UPT Balai Latihan Pengembangan Produktivitas Tenaga Kerja Surabaya
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>

</html>
