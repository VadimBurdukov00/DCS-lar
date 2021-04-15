/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/doers/doers.js ***!
  \*************************************/
$(document).ready(function () {
  $('#editForm').on('submit', function (e) {
    e.preventDefault();
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    console.log($('#editForm').serialize());
    $.ajax({
      type: 'POST',
      url: $('#editForm').attr('action'),
      data: $('#editForm').serialize(),
      success: function success(data) {
        console.log(data);
        var response = data.updated;

        if (response) {
          var notiEdit = new jBox('Modal', {
            content: 'Исполнитель успешно изменен' + '<br>' + '<a href="/doers"> Вернуться на главную </a>'
          });
        } else {
          var notiEdit = new jBox('Modal', {
            content: 'Ошибка изменения'
          });
        }
        notiEdit.open();
      }
    });
  });

  function apendDoer(response) {
    return  "<div class='row'>" +
                "<div class='col-sm-6'>" +
                    "<div class='doer'>" +
                        "Имя: " + response[0].name + "<hr>" +
                        "Должность: " + response[0].post + "<hr>" +
                        "<button id='del' attr-id='" + response['id'] + "' class='btn btn-primary more-button'>Удалить</button>" +
                        " <a href='/doers/editDoer/" + response['id'] + "' class='btn btn-primary more-button'>Редактировать</a>" +
                    "</div>" +
                "</div>" +
            "</div>";
  }

  $('#addDoer').click(function (e) {
    var addDoerModal = new jBox('Modal', {
      width: 400,
      height: 250,
      title: 'Добавить исполнителя',
      ajax: {
        url: '/doers/addDoer',
        reload: 'strict',
        setContent: true,
        success: function success(response) {

          $('#newDoer').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
              type: 'POST',
              url: $('#newDoer').attr('action'),
              data: $('#newDoer').serialize(),
              success: function success(data) {
                  var status = data.created;
                  if(status){
                      var response = [data.info, data.id];
                      console.log(response[0].name)
                      addDoerModal.close();
                      $(".doers").append(apendDoer(response));
                      var notiAdd = new jBox('Modal', {
                          content: 'Исполнитель создан'
                      });

                  } else {
                      var notiAdd = new jBox('Modal', {
                          content: 'Ошибка создания'
                      });
                  }
                  notiAdd.open();
              }
            });
          });
        },
        error: function error() {
          this.setContent('<b style="color: #d33">Ошибка загрузки формы.</b>');
        }
      }
    }).open();
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
        var response = data.deleted;

        if (response) {
          elemDiv.remove();
          var notiDel = new jBox('Modal', {
            content: 'Исполнитель успешно удален'
          });
          notiDel.open();
        } else {
          var notiDel = new jBox('Modal', {
            content: 'У данного исполнителя имеется задание, где он единственный испонитель. Невозможно удалить!'
          });
          notiDel.open();
        }
      },
      error: function error() {
        var notiDel = new jBox('Modal', {
          content: 'При удалении произошла ошибка'
        }).open();
      }
    });
  });
});
/******/ })()
;
