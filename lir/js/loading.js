function loader(){
  var time = 1;
  var id = setInterval(time1, 1);
  function time1(){
    if(time >= 30){
      clearInterval(id);
      $('#main').show();
      $('.loader').hide();
    }else{
      time++;
    }
  }
}