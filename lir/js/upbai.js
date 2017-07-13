/*
  ** Cho hinh xuat hien khi up file hinh anh
  */
  var openFile = function(event,name) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById(name);
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
  $("#file1").change(function(e){
  	openFile(event,'output1');
  });
  $("#file2").change(function(e){
    openFile(event,'output2');
  });
  $("#file3").change(function(e){
    openFile(event,'output3');
  });
  $("#file4").change(function(e){
    openFile(event,'output4');
  });
  /*
    ** Kiem tra form thoa dieu kien cho up bai
    */ 

    /** 
    ** Gan gia tri mac dinh cho upbai
    **/
    $(document).ready(function(){
    $("#ten_san_pham").val("");
      $("#tieu_de").val("");
      $("#noi_dung").val("");
      $("#blur_sdt").val("");
      $('#tieu_de_chon_loai').attr('selected',true);
      $("#tieu_de_chon_kv").attr('selected',true);
    });