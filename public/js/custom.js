/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/custom.js ***!
  \********************************/
$(document).ready(function () {
    new jBox('Modal', {
      width: 500,
      height: 400,
      attach: '#myModal',
      title: 'Добавить задачу', 
      ajax: {
        url: '/tasks/addTask',
        reload: 'strict',
        setContent: true,
        success: function (response) {
       //   console.log('jBox AJAX response', response);
         // this.setContent('<b>Content loaded.</b><br>Check console for response.');
        },
        error: function () {
          this.setContent('<b style="color: #d33">Ошибка загрузки формы.</b>');
        }
      }
    });

    var notiAdd = new jBox('Modal', {
      content: 'Задача успешно добавлена'
    });

	//console.log("123")
   	$('#contactform').on('submit', function (e) {
        e.preventDefault();
     
     	$.ajax({
            type: 'POST',
            url: '/tasks/save',
            data: $('#contactform').serialize(),
            success: function (data) {
                if (data) {
                    console.log(data)
                    $('#senderror').hide();
                    $('#sendmessage').show();
                    $("body").html(data);
                    notiAdd.open();
                } else { 
                	console.log(data)
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
    });

    $(document).on('click', '#del', function (e) {
		//e.preventDefault();
    	var id =$(this).attr("attr-id");
    	//console.log(
        var elemDiv = $($(this).closest("div.task")[0])
            //).hide()
    	$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

    	$.ajax({
            type: 'POST',
            url: '/tasks/delete/'+id,
            data: {id: id},
            success: function (data) {
            	response = jQuery.parseJSON(data)
            	console.log(response['result'])
                if (response['result']) {
                    elemDiv.remove();
                } else { 
                     $($(this).closest("div.task")[0]).hide();
                	console.log(data)
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            },
            error: function () {
            	console.log(data["result"])
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
    });	

    var notiEdit = new jBox('Modal', {
      content: 'Задача успешно обновлена'
    });

    $('#editForm').on('submit', function (e) {
        e.preventDefault();
     
        $.ajax({
            type: 'POST',
            url: '/tasks/update',
            data: $('#editForm').serialize(),
            success: function (data) {
                if (data) {
                  console.log(data)
                    $("body").html(data);
                    notiEdit.open();
                } else { 
                    console.log(data)
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            },
            error: function () {
                $('#senderror').show();
                $('#sendmessage').hide();
            }
        });
    });
     
});	
/******/ })()
;