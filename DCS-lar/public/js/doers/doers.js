  $(document).ready(function () {
    new jBox('Modal', {
      width: 400,
      height: 250,
      attach: '#doerAddBtn',
      title: 'Добавить исполнителя',
      ajax: {
        url: '/doers/addDoer',
        reload: 'strict',
        setContent: true,
        success: function success(response) {
        },
        error: function error() {
          this.setContent('<b style="color: #d33">Ошибка загрузки формы.</b>');
        }
      }
    });
    var notiAdd = new jBox('Modal', {
      content: 'Исполнитель успешно добавлен'
    }); 

    $('#doerAdd').on('submit', function (e) {
      e.preventDefault();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'POST',
        url: '/doers/save',
        data: $('#doerAdd').serialize(),

        success: function success(data) {
          if (data) {
            $('#senderror').hide();
            $('#sendmessage').show();
            $("body").html(data);
            notiAdd.open();
          } else {

            $('#senderror').show();
            $('#sendmessage').hide();
          }
        },
        error: function error() {
          $('#senderror').show();
          $('#sendmessage').hide();
        }
      });
    });

    $(document).on('click', '#del', function (e) {
      var id = $(this).attr("attr-id"); 
      var elemDiv = $($(this).closest("div.doer")[0]); 

      $.ajax({
        type: 'POST',
        url: '/doers/delete/' + id,
                           
        data: {
          "_token": $('meta[name="csrf-token"]').attr('content'),
          id: id
        },
        success: function success(data) {
          if (data) {
            elemDiv.remove();
            
            var notiDel= new jBox('Modal', {
              content: 'Исполнитель успешно удален'
            }); 
            notiDel.open();

          } else {
            var notiDel = new jBox('Modal', {
              content:  'У данного исполнителя имеется задание, где он единственный испонитель. Невозможно удалить!'
            });       
            notiDel.open();
          }
        },
        error: function error() {
          var notiDel = new jBox('Modal', {
            content:  'При удалении произошла ошибка'
          }); 
        }
      });
    });

    $(document).on('mousedown', '.edit', function (e) {
      $('.curId').val($(this).attr('attr-id'));

      new jBox('Modal', {
        width: 300,
        height: 200,
        attach: '.edit',

        title: 'Редактировать пользователя',
        ajax: {
          url: '/doers/editDoer/' + $('.curId').val(),
          reload: true,
          setContent: true,
          success: function success(response) {
          },
          error: function error() {
            this.setContent('<b style="color: #d33">Ошибка загрузки формы.</b>');
          }
        }
      });
    });

    
    
    var notiEdit = new jBox('Modal', {
      content: 'Задача успешно обновлена'
    });

    $('#editForm').on('submit', function (e) {
      e.preventDefault();

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'POST',
        url: '/doers/update',
        data: $('#editForm').serialize(),
        success: function success(data) {
          if (data) {
            console.log(data);
            $("body").html(data);
            notiEdit.open();
          } else {
            console.log(data);
            $('#senderror').show();
            $('#sendmessage').hide();
          }
        },
        error: function error() {
          $('#senderror').show();
          $('#sendmessage').hide();
        }
      });
    });
  });
