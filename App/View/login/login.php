<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/../node_modules/@glidejs/glide/dist/css/glide.core.min.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/Assets/css/style.css" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/Assets/css/custom.css" />
</head>

<body>
  <section class="flex flex-col justify-center items-center h-screen overflow-hidden">
    <div class="container my-auto relative">
      <span class="w-40 h-40 bg-orange-300 blur-xl rounded-full absolute top-0 start-32 -translate-y-1/2 animate-blob"></span>
      <span class="w-40 h-40 bg-pink-300 blur-xl rounded-full absolute bottom-0 end-44 translate-y-1/2 animate-blobb"></span>
      <div class="relative flex flex-wrap items-center justify-center lg:flex-row">
        <!-- form login -->
        <div class="w-full rounded-lg p-4 shadow-[0.625rem_0.625rem_0.875rem_0_rgb(0,0,0,0.1),-0.5rem_-0.5rem_1.125rem_0_rgb(0,0,0,0.1)] backdrop-blur-3xl lg:w-1/3 lg:p-8">
          <form action="<?= BASEURL; ?>/User/loginUser" method="post" class="my-auto flex flex-col">
            <span class="mb-12 text-xl lg:text-2xl">
              <h1 class="mb-4 text-base lg:text-xl">ChatApp</h1>
              <h2 class="font-normal">Welcome back,</h2>
              <p class="font-thin">Sign in to continue to ChatApp</p>
            </span>
            <input name="username" id="username" type="text" class="input-field" placeholder="Username" required />
            <input name="password" id="password" type="password" class="input-field" placeholder="Password" required />
            <span class="mt-5 text-base">Doesn't have account?
              <a href="<?= BASEURL; ?>/User/register" class="text-slate-500 hover:text-red-500 hover:shadow-sm hover:ring-pink-200">Register here</a></span>
            <button class="button-submit" type="submit" name="login" id="login">
              Login
            </button>
          </form>
        </div>
        <!-- end form login -->
        <!-- slider -->
        <div class="hidden rounded-r-lg backdrop-blur-xl p-4 shadow-lg lg:w-1/3 lg:block">
          <div class="glide relative">
            <div class="glide__track" data-glide-el="track">
              <ul class="glide__slides">
                <li class="glide__slide">
                  <div class="relative flex flex-col">
                    <div class="w-1/3 self-center">
                      <img src="<?= BASEURL; ?>/Assets/img/image2.jpg" alt="image" class="mx-auto w-full" />
                    </div>
                    <div class="mb-7 mt-10 w-full">
                      <h1 class="mx-auto w-56 text-center text-3xl font-semibold">
                        Boost your creativity
                      </h1>
                      <p class="mx-auto mt-5 w-56 max-w-full text-center text-base">
                        AI Creativity: Where Imagination Meets Algorithm,
                        Unleashing a World of Infinite Artistic Marvels.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="glide__slide">
                  <div class="relative flex flex-col">
                    <div class="w-1/3 self-center rounded-md">
                      <img src="<?= BASEURL; ?>/Assets/img/image.png" alt="image" class="mx-auto w-full" />
                    </div>
                    <div class="mb-7 mt-10 w-full">
                      <h1 class="mx-auto w-56 text-center text-3xl font-semibold">
                        Boost your productivity
                      </h1>
                      <p class="mx-auto mt-5 w-56 max-w-full text-center text-base">
                        chat with smartest AI - Experience the power of AI
                        with us
                      </p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- Navigation buttons -->
            <div class="glide__bullets absolute bottom-0 left-1/2 flex -translate-x-1/2 flex-row space-x-3" data-glide-el="controls[nav]">
              <button type="button" class="h-2 w-2 rounded-full bg-neutral-800" data-glide-dir="=0"></button>
              <button type="button" class="h-2 w-2 rounded-full bg-neutral-800" data-glide-dir="=1"></button>
            </div>
          </div>
        </div>
        <!-- end slider -->
      </div>
    </div>
  </section>
  <script src="https://kit.fontawesome.com/a2f99ee185.js" crossorigin="anonymous"></script>
  <script type="module" src="<?= BASEURL ?>/../output/js/login.bundle.js"></script>
</body>

</html>