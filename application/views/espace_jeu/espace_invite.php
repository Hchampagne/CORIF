


<div class="container-fluid">
   <div class="row">
      <div class="col">
         <div class="row">
            <div id="target" class="col-3 ui-widget-header">
               <p>drop zone</p>
            </div>
         </div>
      </div>
   </div>



   <div class="row">
      <div class="col">
         <div class="row">
         
            <?php foreach ($cartes as $carte) { ?>
               <div class="card"  id="<?= $carte->car_id; ?>" class="ui-widget-content" style="width: 18rem; height: 24ren;">
                  <img src="<?= base_url("assets/img/images/logo-b.jpg") ?>" class="card-img-top">
                  <div class="card-body">
                     <h5 class="card-title"><?= $carte->car_numero ?></h5>
                     <p><?= $carte->car_type ?></p>
                     <p class="card-text"><?= $carte->car_description ?></p>
                  </div>
               </div>
               <?php } ?>
            
            
         </div>
      </div>
   </div>

</div>
<script>
   $(function() {

      $(".card").click(function() {
         $(this).draggable({cursor:  "crosshair",cursorAt: {top: -5, left:-5}});
      });

      $( "#target" ).droppable({
      drop: function( event, ui ) {
        $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
            .html( "Ajout:" );
      }
    });




   });
</script>