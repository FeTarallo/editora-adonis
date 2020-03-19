$(".sendForm").on('click',function(){
   if($("#form-professor").valid()){
       $(".sendForm").prop("disabled",true) 
       $("#form-professor").submit()  
   }
})