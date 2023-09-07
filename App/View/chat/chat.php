<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat Ai</title>
  <link rel="stylesheet" href="<?= BASEURL ?>/Assets/css/style.css" />
  <link rel="stylesheet" href="<?= BASEURL ?>/Assets/css/custom.css" />
</head>

<body class="bg-neutral-800">
  <header class="bg-neutral-950 absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container py-3 max-w-full relative">
      <div class="flex items-center justify-between">
        <div class="px-4">
          <!-- Awal Hamburger -->
          <button id="hamburger" name="hamburger" type="button" class="block absolute top-1 transition duration-300 ease-in-out ">
            <span class="hamburger-line origin-top-left transition ease-in-out duration-300"></span>
            <span class="hamburger-line transition ease-in-out duration-300"></span>
            <span class="hamburger-line origin-bottom-left transition ease-in-out duration-300"></span>
          </button>
          <!-- Akhir hamburger -->
          <!-- Awal navbar -->
          <nav id="nav-menu" class="pt-1 max-w-[250px] w-full h-screen top-0 -left-64 fixed bg-neutral-900 opacity-90 transition duration-300 ease-in-out">
            <div class="flex flex-col h-screen">
              <!--sidebar menu item -->
              <div class="pl-4 pt-4">
                <span class="text-lg text-white font-bold"><i class="fa-regular fa-calendar-days"></i> Recent: </span>
                <div class="block" id="time-sidebar"></div>
              </div>
              <!-- sidebar menu item -->

              <div class="flex-grow"></div>

              <!--sidebar profil -->
              <div class="flex gap-2 items-center justify-between bg-neutral-800 px-2 py-3">
                <div class="w-10 self-center">
                  <img src="Assets/img/image.png" alt="image" class="mx-auto w-full rounded-full" />
                </div>
                <div class="flex flex-col text-white">
                  <h1 class="text-base font-semibold">
                    <?= $_SESSION['username']; ?>
                  </h1>
                </div>
                <div class="p-4">
                  <button class="flex gap-1" id="dot-button">
                    <span class="w-1 h-1 rounded-full bg-white"></span>
                    <span class="w-1 h-1 rounded-full bg-white"></span>
                    <span class="w-1 h-1 rounded-full bg-white"></span>
                  </button>
                </div>
                <div class="hidden absolute max-w-[150px] w-full bottom-20 right-3" id="profile-menu">
                  <button id="logout" class="flex flex-wrap divide-y bg-white p-2 rounded-md group hover:bg-red-600 w-full justify-center">
                    <span class="group-hover:text-slate-50">Logout</span>
                  </button>
                </div>
              </div>
              <!-- sidebar profil -->
            </div>
          </nav>
          <!-- Akhir navbar -->
        </div>

        <!-- Title chat -->
        <h1 class="text-white">ChatApp</h1>

        <!-- Awal new chat -->
        <div class="flex items-center">
        </div>
        <!-- Akhir new chat -->
      </div>
    </div>
  </header>

  <section class="p-5 mt-20 mb-56 flex flex-col items-center justify-center" id="chat">
    <!-- bublechat -->
    <div class="container relative">
      <div class="flex flex-wrap" id="bubble">
      </div>
    </div>
    <!-- AKhir bubble chat -->

    <!-- Awal input chat -->
    <div class="bottom-2 md:w-full w-10/12 fixed">
      <form class="container" method="post" id="messageForm">
        <div class="relative flex justify-start items-center">
          <textarea id="message" name="message" class="block w-full p-4 pb-0 resize-none max-h-28 text-sm text-white rounded-lg bg-neutral-600" style="border: none; outline: none;" placeholder="Send a message" required></textarea>
          <button type="submit" disabled name="send" id="send" class="absolute right-4 bottom-2 button-send">
            <span id="sendButtonText" class="transition-opacity duration-300 ease-in p-2">
              <i class="fa-solid fa-paper-plane"></i>
            </span>
            <span id="sendButtonDots" class="hidden transition-opacity duration-300 ease-in p-2">
              <span class="w-1 h-1 rounded-full bg-white"></span>
              <i class="fa-solid fa-spinner fa-spin-pulse"></i>
            </span>
          </button>
        </div>
      </form>
    </div>
    <!-- Akhir input chat -->
  </section>
  <script src="https://kit.fontawesome.com/a2f99ee185.js" crossorigin="anonymous"></script>
  <script type="module" src="<?= BASEURL ?>/../output/js/app.bundle.js"></script>
</body>

</html>