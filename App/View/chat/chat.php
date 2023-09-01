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
    <div class="container py-3 max-w-full">
      <div class="flex items-center justify-between relative">
        <div class="flex items-center px-4">
          <!-- Awal Hamburger -->
          <button id="hamburger" name="hamburger" type="button" class="block absolute left-4">
            <span class="hamburger-line origin-top-left transition ease-in-out duration-300"></span>
            <span class="hamburger-line transition ease-in-out duration-300"></span>
            <span class="hamburger-line origin-bottom-left transition ease-in-out duration-300"></span>
          </button>
          <!-- Akhir hamburger -->

          <!-- Awal navbar -->
          <nav id="nav-menu" class="-left-64 top-9 pt-1 absolute max-w-[250px] w-full bg-neutral-900 transition duration-300 ease-in-out" style="height: calc(100vh - 3rem)">
            <div class="flex flex-col h-full divide-y">
              <!--sidebar menu item -->
              <h1 class="text-xl text-white font-bold">Date: </h1>
              <div class="block" id="time-sidebar">
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
        <h1 class="text-white">New Chat</h1>

        <!-- Awal new chat -->
        <div class="flex items-center">
        </div>
        <!-- Akhir new chat -->
      </div>
    </div>
  </header>

  <section class="pt-14 pb-20" id="chat">
    <!-- bublechat -->
    <div class="container">
      <div class="flex flex-wrap" id="bubble">

      </div>
    </div>
    <!-- AKhir bubble chat -->

    <!-- Awal input chat -->
    <div class="fixed bottom-2 w-full flex px-2">
      <form class="container" method="post" id="messageForm">
        <div class="relative">
          <textarea id="message" name="message" class="block w-full p-4 pb-0 max-h-28 text-sm text-white border border-gray-300 rounded-lg bg-neutral-600 focus:ring-neutral-500 focus:border-neutral-500" placeholder="Send a message" required></textarea>
          <button type="submit" name="send" id="send" class="text-white absolute right-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-1 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2 disabled:hover:bg-green-700">
            <span id="sendButtonText" class="transition-opacity duration-300 ease-in">
              Send
            </span>
            <span id="sendButtonDots" class="hidden transition-opacity duration-300 ease-in">
              <span class="w-1 h-1 rounded-full bg-white"></span>
              ...
            </span>
          </button>
        </div>
      </form>
    </div>
    <!-- Akhir input chat -->
  </section>
  <script src="<?= BASEURL; ?>/../node_modules/sweetalert/dist/sweetalert.min.js"></script>
  <script src="<?= BASEURL ?>/Assets/js/roomchat.js"></script>
  <script type="module" src="<?= BASEURL ?>/Assets/js/main.mjs"></script>
</body>

</html>