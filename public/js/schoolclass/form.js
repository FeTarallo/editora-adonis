$(document).on("click", ".add-student", function() {
   clonar(".student", "#students", true)
   $(".student").last().find("input").val("")
})

$(document).on("click", ".del-student", function() {
   if($(".student").length > 1) {
       remover(".student", $(this))
   } else {

       Swal.fire({
           type: 'warning',
           title: 'Atenção!',
           text: 'Deve conter no mínimo 1 aluno!',
       })
   }
})

function clonar(target, local, indices) {
   var clone = $(target).last().clone()
   clone.find(".errors").remove()
   clone.hide().fadeIn("slow").appendTo(local)

   if(indices) {
       $(target).last().find('input').each(function(i, input) {
           var index = $(this).attr('name').split('[')[1].split(']')[0]
           $(this).attr('name', $(this).attr('name').replace(index, parseInt(index) + 1))
       })
   }
}

//FUNÇÃO PARA REMOVER UM ELEMENTO
function remover(target, buttonClicked) {
   $(buttonClicked).closest(target).remove()
}

$(".sendForm").on('click',function(){
   if($("#form-turma").valid()){
       $(".sendForm").prop("disabled",true) 
       $("#form-turma").submit()  
   }
})