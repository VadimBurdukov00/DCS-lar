$(document).ready(function () {
    function apendTask(response){
    return  "<div class='row'>"+
              "<div class='col-sm-6'>"+
                "<div class='task'>"+
                  "Название: "+ response['info'].name + "<hr>"+ 
                  "Описание: " + response['info'].desc+ "<br>"+ 
                  "Статус"+ response['status'].status+ "<br>"+ 
                  "Исполинтели: " + response['doers'] + "<br>"+ 
                  "<button id='del' attr-id='"+response['info'].id+"' class='btn btn-primary more-button'>Удалить</button>" +
                  " <a href='/tasks/editTask/"+response['info'].id+"' class='btn btn-primary more-button'>Редактировать</a>"+
                "</div>"+
              "</div>"+
            "</div>"
    }


    $('#addTask').click(function(e){
        var addModal = new jBox('Modal', {
          width: 500,
          height: 400,
          title: 'Добавить задачу', 
          ajax: {
            url: '/tasks/addTask',
            reload: 'strict',
            setContent: true,
            success: function (response) {
                

                $('#addform').on('submit', function (e) {
                    e.preventDefault();
                 
                    $.ajax({
                        type: 'POST',
                        url: $('#addform').attr( 'action' ),
                        data: $('#addform').serialize(),
                        success: function (data) {
                            var response = jQuery.parseJSON( data );
                            console.log(response)
                            if(response['info']) {
                                var notiAdd = new jBox('Modal', {
                                  content: 'Задача успешно добавлена'
                                });
                                addModal.close();
                                $(".tasks").append(apendTask(response));
                                notiAdd.open();
                            } else {
                                var notiAdd = new jBox('Modal', {
                                  content: 'Необходимо указать хотя бы одного исполнителя!'
                                });
                                notiAdd.open();
                            }
                        }
                    });
                });
            },
            error: function () {
              this.setContent('<b style="color: #d33">Ошибка загрузки формы.</b>');
            }
          }
        }).open();
    });

    $(document).on('click', '#del', function (e) {
    	var id =$(this).attr("attr-id");
        var elemDiv = $($(this).closest("div.task")[0])

    	$.ajax({
            type: 'POST',
            url: '/tasks/delete/'+id,
            data: {"_token": $('meta[name="csrf-token"]').attr('content'), id: id},
            success: function (data) {
            	response = jQuery.parseJSON(data)

                if (response['deleted']) {
                    elemDiv.hide();
                    console.log(elemDiv);
                    new jBox('Modal', {
                      content: 'Задача успешно удалена'
                    }).open();
                   
                } 
            },
        });
    });	

    

    $('#editForm').on('submit', function (e) {
        e.preventDefault();
     
        $.ajax({
            type: 'POST',
            url: $('#editForm').attr( 'action' ),
            data: $('#editForm').serialize(),
            success: function (data) {
                response = jQuery.parseJSON(data)
                if (response['updated']) {
                    var notiEdit = new jBox('Modal', {
                      content: 'Задача успешно обновлена'+'<br>'+ '<a href="/tasks"> Вернуться на главную </a>'
                    });
                    notiEdit.open();
                    
                    
                } else {
                    var notiEdit = new jBox('Modal', {
                      content: 'Необходимо указать хотя бы одного исполнителя!',     
                    });
                    notiEdit.open();
                }
            },
        });
    });
     
});	
