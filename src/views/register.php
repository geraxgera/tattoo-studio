<!-- BACKGROUND -->
<div class="text-gray-600 body-font bg-gradient-to-b from-gray-600  to-black absolute w-full h-full overflow-hidden">
    <div class="container absolute bottom-64 left-36 ">

        <div class="row">
            <div class="relative bottom-1/3">
                <h1 class=" relative left-40 text-3xl font-semibold text-white pb-5">Registrierung</h1>
     <!-- method: POST, damit die Daten nicht über die URL verschickt werden -->
        <form class="px-48 my-1 max-w-3-xl -ml-8 space-y-3" method="post" novalidate>
            <input type="text" value="<?php echo isset($user) ? $user->username : '' ?>" class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none  <?php echo isset($user) && $user->hasError("email") ? "border-red-600" : ""  ?> " name="username" id="username" placeholder="Username angeben">
            <div class="text-red-600">
                <?php echo isset($user) && $user->hasError("username") ? $user->getFirstError("username") : " " ?>
            </div>
            <input type="email" id="email" value="<?php echo isset($user) ? $user->email : '' ?>" class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none <?php echo isset($user) && $user->hasError("email") ? "border-red-600" : ""  ?>" name="email" placeholder="E-mail eingeben">
            <div class="text-red-600">
                <?php echo isset($user) && $user->hasError("email") ? $user->getFirstError("email") : " " ?>
            </div>
            <input type="password" value="<?php echo isset($user) ? $user->password : '' ?>" class="border border-gray-400 block py-2 px-4 w-full rounded focus:outline-none <?php echo isset($user) && $user->hasError("password") ? "border-red-600" : ""  ?> " name="password"
            id="pass" placeholder="Passwort angeben"><br>
            <div class="text-red-600">
                <?php echo isset($user) && $user->hasError("password") ? $user->getFirstError("password") : " " ?>
            </div>
            <button class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded" type="submit">Registrieren</button>
        </form>
    </div>
        </div>
    </div>  