<?php
use Core\Application;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Shades</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/style.css">
    <script src="/leistungen-preise.js" defer></script>
    
    
</head>
<?php
    $user_session = (Application::$app->session->get("user"));
  ?>
<body> 


     <!-- HEADER -->
     <header class="bg-black bg-opacity-60 text-white body-font z-40 fixed w-full">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a href="/"><img class="w-24" src="/fotos/tattoo_machine.svg" alt=""></a>
            <span class="ml-3 text-xl"></span>
          <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
            <a href="/about-me" class="bg-none hover:bg-red-500 py-2 px-4 rounded-lg">Über Mich</a>
            <a href="/leistungen-preise" class="bg-none hover:bg-red-500 py-2 px-4 rounded-lg">Leistungen</a>
            <a href="/alluserrezensionen" class="bg-none hover:bg-red-500 py-2 px-4 rounded-lg">Rezensionen</a>
            <a href="/kontakt" class="bg-none hover:bg-red-500 py-2 px-4 rounded-lg">Kontakt</a>


          <?php 
              if($user_session):
          ?>
           <a href="/rezensionen" class="bg-none hover:bg-red-500 py-2 px-4 rounded-lg">Rezension schreiben</a>
            <a href="/logout" class="bg-stone-600 hover:bg-zinc-400 py-2 px-4 rounded-lg ml-4">LOGOUT</a>
           
            <?php
              endif;
            ?>
          </nav>
          <?php
              if(!$user_session):
            ?>
            <div class=" xl:ml-64 px-20 px-5">
          <a href="/login" class="bg-stone-600 hover:bg-zinc-400 py-2 px-4 rounded-lg ">LOGIN</a>
          <a href="/register" class="bg-stone-600 hover:bg-zinc-400 py-2 px-4 rounded-lg ml-4">REGISTRIEREN</a>
            </div>

          <?php
              endif;
            ?>
        
        </div>
      </header>

    <main class="container">
        <?php if(\Core\Application::$app->session->getFlash("erfolgreich")): ?>
            <div class="alert alert-success">
                <?php echo \Core\Application::$app->session->getFlash("erfolgreich") ?> 
            </div>
        <?php endif; ?>    
        {{content}}
    </main>
    
       <!-- FOOTER -->
      <footer class="bg-black bg-opacity-60 text-white body-font absolute bottom-0 w-full">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a href=""><img class="w-5" src="/fotos/location_icon.svg" alt=""></a>
            <span class="ml-3 text-sm">Dr.Otto-höchtl-str.2 <br> 94315 Straubing</span>
          </a>
          <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 — 2022
            <a href="/src/fotos/location_icon.svg" class="text-white ml-1" rel="noopener noreferrer" target="_blank">Black Shades</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <!-- FACEBOOK -->
            <a href="#" target="_blank" class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <!-- INSTAGRAM -->
            <a href="https://www.instagram.com/black.shades.tattoo/" target="_blank" class="ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
          </span>
        </div>
      </footer>
      
</body>

</html>