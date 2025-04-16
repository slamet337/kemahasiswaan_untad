<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="<?php echo base_url('assets/img/YAKUZA.png'); ?>"
                    class="img-fluid" alt="Yakuza Image">
                </div>

                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="<?php echo site_url('auth/login'); ?>" method="post">
                        
                        <div class="divider d-flex align-items-center my-4">
                            <p>LOGIN</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control form-control-lg"
                                placeholder="Masukkan username Anda" required />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg"
                                placeholder="Masukkan password Anda" required />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="rememberMe" />
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                            <a href="#" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Don't have an account? <a href="<?php echo site_url('auth/register'); ?>"
                                    class="link-danger">Register</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © <?php echo date('Y'); ?>. All rights reserved.
            </div>
            <!-- Right -->
            <div>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </section>
</body>
</html>
