$(".button-collapse").sideNav();
$('.collapsible').collapsible();
$('select').material_select();
$(".dropdown-button").dropdown();
$('.slider').slider({
  //Se le cambia el alto al Slider
  height: 400
});
$('.materialboxed').materialbox();
$('ul.tabs').tabs();
$('.modal').modal();
 $(".button-collapse").sideNav();
 function eliminarDS (id){
  console.log(id);
  window.location="../eliminar_descanso_semanal.php?id="+id;
}