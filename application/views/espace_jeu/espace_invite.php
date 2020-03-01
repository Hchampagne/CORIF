


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
         <div class="row" >

            <?php foreach ($cartes as $carte) { ?>
               <div   id="<?= $carte->car_id; ?>" class="card ui-widget-content" style="width: 14rem;">
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
      
     
      $(".card").draggable({cursor:  "blank"});
         

      $( "#target" ).droppable({
      drop: function( event, ui ) {
         
                $(this).css('background', 'rgb(0,200,0)');
            },
            over: function(event, ui) {
                $(this).css('background', 'orange');
            },
            out: function(event, ui) {
                $(this).css('background', 'cyan');
            }
          
     
    });




   });
</script>