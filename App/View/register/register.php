<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/Assets/css/style.css" />
</head>

<body class="bg-neutral-800">
  <section class="pt-36">
    <div class="container">
      <div class="flex flex-wrap flex-col items-center justify-center">
        <h1 class="text-3xl text-white font-semibold">Registration</h1>
        <form action="" method="post" class="mt-16 flex flex-col">
          <label for="username" class="text-white">Your username</label>
          <input name="username" id="username" type="text" class="input-field" placeholder="funnyclown" required />
          <label for="email" class="text-white mt-5">Your password</label>
          <input name="password" id="password" type="password" class="input-field" placeholder="userpassword" required />
          <span class="text-base text-white mt-5">having account? <a href="login.php" class="text-pink-700 hover:text-pink-500 hover:ring-pink-200 hover:shadow-sm">login here</a></span>
          <button class="button-submit" type="submit" id="register" name="register">Register</button>
        </form>
      </div>
    </div>
  </section>
  <script type="module" src="<?= BASEURL ?>/../output/js/regist.bundle.js"></script>
</body>

</html>