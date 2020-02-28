
$(document).ready(function () { 


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

  







