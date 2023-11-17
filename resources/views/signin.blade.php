<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курсы.ru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <style>
        #hero {
            width: 100%;
            height: 80vh;
            overflow: hidden;
            background-image: url(/images/hero.jpeg);
            background-position: 50% 20%;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>
    <x-header />
    <main>
        <section id="hero" class="d-flex justify-content-center align-items-center">
            <h1 class="m-3 text-white bg-dark p-1 opacity-75">
                Онлайн курсы - это круто!
            </h1>
        </section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Авторизация</div>

                        <div class="card-body">
                            <form method="POST" action="/signin">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Почта</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">
                                        Авторизация
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
