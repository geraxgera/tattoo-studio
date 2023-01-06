
<?php
    use Core\Application;
    $user_session = (Application::$app->session->get("user"));
  ?>

<!-- BACKGROUND-IMAGE --> 
<img class="h-full w-full absolute top-0 z-0 object-cover inline-block" src="./fotos/home.jpg" alt="">
      <!-- NAME -->
      
        <?php 
        if($user_session):
    ?>
    
      <button class=" absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
        TERMIN BUCHEN
      </button>

      <?php
              endif;
            ?>
 <h1 class="text-red-500 absolute text-6xl bottom-1/4 left-3/4 leading-snug">BLACK <br> SHADES <br> TATTOO</h1> 