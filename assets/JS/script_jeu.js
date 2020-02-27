
$(document).ready(function () { 
  setInterval(() => {
      $.get("<?= site_url("
          jeu / etat / " . $id_session) ?>",
          function (data) {

              if (data == "2") {
                  $("#btn_solution").show();
              } else {
                  $("#btn_solution").hide();
              }
          })

  }, 1000);

  // sur click change couleur titre carte
  $(".btn-metiers").click(function () {
      var id = $(this).data("id");

      if ($(".metier-" + id).hasClass("couleur-metier-" + id)) {
          $(".metier-" + id).removeClass("couleur-metier-" + id).addClass("bg-primary");
      } else {
          $(".metier-" + id).removeClass("bg-primary").addClass("couleur-metier-" + id);
      }

  });


  // deplacement carte
  function evt_dragover() {
      $(".dossier").on("dragover", function (ev) {
          ev.originalEvent.dataTransfer.dropEffect = "move";
          ev.preventDefault();
      });
  }


  //  drop carte
  function evt_dragdrop() {
      $(".carte").on("dragstart", function (ev) {

          ev.originalEvent.dataTransfer.setData("text", ev.target.id);
          ev.originalEvent.dataTransfer.effectAllowed = "move";
      });
      $(".dossier").on("drop", function (ev) {
          var dest = $(this).closest('.dossier')[0];

          var data = ev.originalEvent.dataTransfer.getData("text");
          dest.appendChild(document.getElementById(data));

          if (dest.id == "cartes") { // en bas
              $("#" + data).addClass("col-6 col-sm-4 col-md-3 col-lg-2");
          } else { // en haut
              $("#" + data).removeClass("col-6 col-sm-4 col-md-3 col-lg-2");
          }
          compte_cartes();
      });
  }


  // enlève une carte de la pile  
  function evt_remove() {
      $(".btn_close").click(function () {
          var div = $(this).parent();
          div.children().each(function () {
              if ($(this).hasClass("carte")) {

                  $(this).addClass("col-6 col-sm-4 col-md-3 col-lg-2");
                  $(this).appendTo($("#cartes"));
              }
          });
          div.remove();
          compte_cartes();
      });
  }

  // compte des cartes
  function compte_cartes() {
      $("#compteur").html($("#cartes").children().length);
  }

  // ?????????????????  
  evt_dragdrop();
  evt_dragover();
  evt_remove();
  compte_cartes();

  // ajout drop zone   
  $("#btn_add").click(function () {

  var metiers = document.getElementById("metiers");
  var tmp = metiers.innerHTML;
  var ajout = "<div class=\"col-6 col-sm-4 col-md-3 col-lg-2 metier dossier\">\
                       <button class=\"btn btn-info btn_close\" >- Supprimer</button>\
                       <div class=\"textbox\" contenteditable>Metier ?</div>\
                       </div>";
  metiers.innerHTML = tmp + ajout;
  evt_dragdrop();
  evt_dragover();
  evt_remove();

  });
  });



  // compteur
  var date = new Date();
  date.setMinutes(date.getMinutes() + 15);

  function compte_a_rebours() {
      var compte_a_rebours = document.getElementById("compte_a_rebours");
      var date_actuelle = new Date();
      var date_evenement = new Date(date);
      var total_secondes = (date_evenement - date_actuelle) / 1000;


      if (total_secondes < 0) {
          total_secondes = Math.abs(total_secondes); // On ne garde que la valeur absolue
      }

      if (total_secondes > 0) {
          var jours = Math.floor(total_secondes / (60 * 60 * 24));
          var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
          minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
          secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));


          var mot_jour = "jrs";
          var mot_heure = "h";
          var mot_minute = "min";
          var mot_seconde = "sec";

          if (jours == 0) {
              jours = '';
              mot_jour = '';
          } else if (jours == 1) {
              mot_jour = "jrs";
          }

          if (heures == 0) {
              heures = '';
              mot_heure = '';
          } else if (heures == 1) {
              mot_heure = "h";
          }

          if (minutes == 0) {
              minutes = '';
              mot_minute = '';
          } else if (minutes == 1) {
              mot_minute = "min,";
          }

          if (secondes == 0) {
              secondes = '';
              mot_seconde = '';
              et = '';
          } else if (secondes == 1) {
              mot_seconde = "s";
          }

          if (minutes == 0 && heures == 0 && jours == 0) {
              et = "";
          }

          compte_a_rebours.innerHTML = jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + secondes + ' ' + mot_seconde;
      } else {
          compte_a_rebours.innerHTML = 'Jeu terminé.';
      }

      var actualisation = setTimeout("compte_a_rebours();", 1000);
  }
  compte_a_rebours();







