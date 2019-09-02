function selecionar(id){
    $.ajax({
        url:'http://localhost/Hamburgueria/home/listarPedido',
        type:'POST',
        data:{id:id},
        success:function(i){
            $('.modal').find('.modal-body').html(i);
            $('.modal').modal('show');

            $('#Modal').find('form').on('submit', function(e){
                e.preventDefault();

                var pedido = new Array();

                var quant = $(this).find('input[name=quant]').val();

                var x = 0;
                $.each($(".pedido"), function(i){
                    if($(this).prop("checked")){
                        pedido[x] = $(this).val();
                        x = x+1;
                    }
                })
                itens = pedido.join(',');

                $.ajax({
                    url:'http://localhost/Hamburgueria/home/confirmarPedido',
                    type:'POST',
                    data:{id:id, quant:quant, itens:itens},
                    success:function(){
                        location.reload();
                    }
                });
            });
        }
    });
}

function editarPedido(id){
    $.ajax({
        url:'http://localhost/Hamburgueria/home/editarPedido',
        type:'POST',
        data:{id:id},
        success:function(e){
            
            $(".modal").find(".modal-body").html(e);   
            $(".modal").modal('show');
        }
    });
}

function trocar(idProduto, idPedido){
    $.ajax({
        url:'http://localhost/Hamburgueria/home/listarPedido',
        type:'POST',
        data:{id:idProduto},
        success:function(i){
            $('.modal').find('.modal-body').html(i);
            $('.modal').modal('show');

            $('#Modal').find('form').on('submit', function(e){
                e.preventDefault();

                var pedido = new Array();

                var quant = $(this).find('input[name=quant]').val();

                var x = 0;
                $.each($(".pedido"), function(i){
                    if($(this).prop("checked")){
                        pedido[x] = $(this).val();
                        x = x+1;
                    }
                })
                itens = pedido.join(',');

                $.ajax({
                    url:'http://localhost/Hamburgueria/home/mudarPedido',
                    type:'POST',
                    data:{idProduto:idProduto, idPedido:idPedido, quant:quant, itens:itens},
                    success:function(){
                        location.reload();
                    }
                });
            });
        }
    });
}

function consultarHistorico(){
    $.ajax({
        url:'http://localhost/Hamburgueria/home/consultaHistorico',
        success:function(i){
            $('.modal').find('.modal-body').html('Consulta');
            $('.modal').find('.modal-body').html(i);
            $('.modal').modal('show');
        }
    });
}

function iniciarPreparacao(id){
    $.ajax({
        url:'http://localhost/Hamburgueria/ajax/iniciarPreparacao',
        type:'POST',
        data:{id:id},
        success:function(e){
            location.reload();
        }
    });
}

function terminarPreparacao(id){
    $.ajax({
        url:'http://localhost/Hamburgueria/ajax/terminarPreparacao',
        type:'POST',
        data:{id:id},
        success:function(e){
            location.reload();
        }
    });
}

function addIngrediente(){

    $('#ingrediente').after('<div class="form-group"> <label>Ingredientes</label> <input type="text" required class="form-control" name="ingrediente[]" placeholder="Escreva o nome do Ingrediente"> </div>');

}

function enviarEmail(email){
   $.ajax({
        url:'http://localhost/Hamburgueria/ajax/enviarEmail',
        type:'POST',
        data:{email:email},
        success:function(e){
            alert("E-mail Enviado a "+e);
        }
    });
}

function excluirPro(id){

    $('.modal').find('.modal-title').html("Deseja realmete apagar esse registro ?");
    $('.modal').find('.footerModal').html("<div class='modal-footer text-center'><button type='button' class='btn btn-primary' onclick='excluitProduto("+id+")'>Confirmar Exclusão</button></div>");
    $('.modal').modal('show');
}

function excluitProduto(id){
    $.ajax({
        url:'http://localhost/Hamburgueria/ajax/apagarProduto',
        type:'POST',
        data:{id:id},
        success:function(e){
            location.reload();
        }
    });
}

$(document).ready(function(){
    $('.preco').mask('000.000.000.000.000,00', {reverse: true});
  });