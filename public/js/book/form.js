CKEDITOR.replace('ckeditor');

$(document).ready(function() {
   var max_fields      = 10; //maximum input boxes allowed
   var wrapper         = $("#pages"); //Fields wrappe
    
   var x = 1; //initlal text box count
   $(wrapper).on("click",".pageAdd", function(e){ //on add input button click
      e.preventDefault();
      if(x < max_fields){ //max input box allowed
         x++; //text box increment
         var editorId = 'editor_' +x;
         var imageId = 'image_' +x;
         $(wrapper).append('<div id="pages"><div class="box"><h4 class="sub-title col-lg-12">Página '+x+'</h4><div class="row page"><div class="col-lg-3 imgUp"><div class="imagePreview"></div><label class="btn btn-secondary">Upload<input type="file" id="'+imageId+'" class="uploadFile img" name="page['+x+'][image]" value="" style="width: 0px;height: 0px;overflow: hidden;"></label></div><div class="addDel"><i class="fa fa-plus pageAdd"></i><i class="fa fa-trash-alt pageDel"></i></div><div class="col-lg-8"><textarea class="form-control" id="'+editorId+'" name="page['+x+'][text]" required></textarea></div></div></div></div>'); //add input box
            
         CKEDITOR.replace(editorId);
      }
   });
   $(wrapper).on("click",".pageDel", function(e){ //user click on remove text
      e.preventDefault(); 
      if(x > 1) {
         remover("#pages", $(this))
         x--;
      }
      else 
      {
         Swal.fire({
            type: 'warning',
            title: 'Atenção!',
            text: 'Deve conter no mínimo 1 telefone!',
         });
      }
   });
});

$(function() {
   $(document).on("change",".uploadFile", function() {
      var uploadFile = $(this);
      var files = !!this.files ? this.files : [];
      if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
      if (/^image/.test( files[0].type)){ // only image file
         var reader = new FileReader(); // instance of the FileReader
         reader.readAsDataURL(files[0]); // read the local file
         reader.onloadend = function(){ // set image data as background of div
            //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
            uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
         }
      }
   });
});

function remover(target, buttonClicked) {
   $(buttonClicked).closest(target).remove()
}

$(".sendForm").on('click',function(){
   if($("#form-page").valid()){
       $(".sendForm").prop("disabled",true) 
       $("#form-page").submit()  
   }
})