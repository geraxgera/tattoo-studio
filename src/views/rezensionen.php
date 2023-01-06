<section class="text-gray-600 body-font bg-gradient-to-b from-gray-600  to-black absolute w-full h-full overflow-hidden">
<form method="post" class="container flex flex items-center absolute w-[700px] top-[279px] h-[100px] right-[400px]  " enctype="multipart/form-data">

    <div id="create_write_img_wrapper" class="">
<div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600 z-50">
       <div class="flex justify-between items-center py-2 px-3 border-b dark:border-gray-600"></div>
           <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x dark:divide-gray-600">
          
               <button type="button" class="p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                       <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                      
                        <input type="file" name="image">
   
                   </button>

       <div class="py-2 px-4 bg-white rounded-xl dark:bg-gray-800 ">
           <label for="editor" class="sr-only">Bewertung absenden</label>
           <div class="flex">
           
</div>   

<div id="reviewStars-input">
  <input id="star-4" type="radio" value="1" name="rating"/>
  <label title="gorgeous" for="star-4"></label>

  <input id="star-3" type="radio" value="2" name="rating"/>
  <label title="good" for="star-3"></label>

  <input id="star-2" type="radio" value="3" name="rating"/>
  <label title="regular" for="star-2"></label>

  <input id="star-1" type="radio" value="4" name="rating"/>
  <label title="poor" for="star-1"></label>

  <input id="star-0" type="radio" value="5" name="rating"/>
  <label title="bad" for="star-0"></label>
</div>
   
</div>
  <textarea name="description" id="editor" rows="8" class="block px-0 w-full text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Schreib deine bewertung..." required=""></textarea>
  </div>
  </div>
    <button type="submit" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-black bg-gray-300 rounded-lg focus:ring-4 focus:ring-red-200 dark:focus:ring-red-900 hover:bg-gray-900 hover:text-white">
      Bewertung absenden
    </button>

</form>
</div>
<?php
  foreach($rezensionen as $rezension):
?>  
  <div class="max-w-sm rounded overflow-hidden shadow-lg">

  <div id="created_photo_wrapper" class="bg-white br-2 rounded-lg flex justify-center items-center flex-col absolute right-20 top-40 mb-[450px]">
    <img class="flex-wrap p-4 w-[250px]" src="./photo_uploads/<?php echo $rezension["image"] ?>" alt="">
    <div class="px-6 py-4">
    <p class="text-black text-base">

<?php echo "<div class='mb-[20px]' id='text-print'>" . $rezension['description'] . "</div>";?>

  <div class="px-6 pt-4 pb-2">
    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="/editRezensionen/<?php echo $rezension["id"]?>">Bearbeiten</a>
    <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" href="/deleteRezensionen/<?php echo $rezension["id"]?>">Löschen</a> 
  </div>
  </div>

  </p>
  </div>

<?php
    endforeach;
?>