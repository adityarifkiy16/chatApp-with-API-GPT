<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat AI</title>
  <link rel="stylesheet" href="../node_modules/@glidejs/glide/dist/css/glide.core.min.css" />
  <link rel="stylesheet" href="Assets/css/style.css" />
  <link rel="stylesheet" href="Assets/css/custom.css" />
</head>

<body class="bg-neutral-800">
  <section class="pt-20" id="hero">
    <div class="container relative mx-auto">
      <!-- Slider -->
      <div class="glide relative md:p-16">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="flex flex-col md:flex-row relative">
                <div class="w-1/2 self-center">
                  <img src="Assets/img/image2.jpg" alt="image" class="w-full mx-auto" />
                </div>
                <div class="w-full mt-10 mb-10">
                  <h1 class="text-3xl font-semibold text-white text-center w-56 mx-auto">
                    Boost your creativity
                  </h1>
                  <p class="text-base text-white text-center mt-5 max-w-full w-56 mx-auto">
                    AI Creativity: Where Imagination Meets Algorithm,
                    Unleashing a World of Infinite Artistic Marvels.
                  </p>
                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="flex flex-col md:flex-row relative">
                <div class="w-1/2 self-center rounded-md">
                  <img src="Assets/img/image.png" alt="image" class="mx-auto w-full" />
                </div>
                <div class="w-full mt-10 mb-10">
                  <h1 class="text-3xl font-semibold text-white text-center w-56 mx-auto">
                    Boost your productivity
                  </h1>
                  <p class="text-base text-white text-center mt-5 max-w-full w-56 mx-auto">
                    chat with smartest AI - Experience the power of AI with us
                  </p>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <!-- Navigation buttons -->
        <div class="absolute flex space-x-3 flex-row bottom-0 -translate-x-1/2 left-1/2 glide__bullets" data-glide-el="controls[nav]">
          <button type="button" class="w-2 h-2 rounded-full bg-neutral-800 ring-1 ring-white" data-glide-dir="=0"></button>
          <button type="button" class="w-2 h-2 rounded-full bg-neutral-800 ring-1 ring-white" data-glide-dir="=1"></button>
        </div>
      </div>
      <!-- button get started -->
      <div class="w-full my-10 flex self-center justify-center group">
        <button type="button" class="rounded-lg bg-neutral-700 text-white text-xl px-14 py-1 group-hover:bg-neutral-900" onclick="window.location='User/login';">
          Get started
        </button>
      </div>
    </div>
  </section>
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../node_modules/@glidejs/glide/dist/glide.min.js"></script>
  <script src="Assets/js/slider.js"></script>
</body>

</html>