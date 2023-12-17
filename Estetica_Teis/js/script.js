var page = 1;


$("body").on("click", "#guardar_cita", function (ev) {
    var nombre = $('#nombre_cliente').val();
    var apellido1 = $('#apellidocliente1').val();
    var apellido2 = $('#apellidocliente2').val();
    var servicio = $('#servicio').val();
    var telf = $('#telefono').val();
    var fecha = $('#fecha').val();
    if ((typeof nombre !== 'undefined' && nombre) && (typeof apellido1 !== 'undefined' && apellido1)
        && (typeof apellido2 !== 'undefined' && apellido2) && (typeof servicio !== 'undefined' && servicio) && (typeof telf !== 'undefined' && telf.match("[0-9]{9}")) && (typeof fecha !== 'undefined' && fecha)) {
        ev.preventDefault();
        var dataForm = $('form').serialize();

        $.ajax({
            type: 'POST',
            url: './funcionalidad/gestion_citas.php',
            data: dataForm,
            cache: false,
            success: function (data) {
                console.log(data);
            }
        });
    }
});

$("body").on("click", "#logearse", function (ev) {
    var usuario = $('#usuario').val();
    var contraseña = $('#contraseña').val();
    if ((typeof usuario !== 'undefined' && usuario) && (typeof contraseña !== 'undefined' && contraseña)) {
        ev.preventDefault();
        var dataForm = $('form').serialize();
        $.ajax({
            type: 'POST',
            url: './funcionalidad/login.php',
            data: dataForm,
            cache: false,
            success: function (resultado) {
                if (resultado != "El usuario o contraseña son incorrectos") {
                    location.href = "./Inicio.php";
                    
                } else {
                    $('#modal').show();
                $('.modal-body > p').append("El usuario o la contraseña son incorrectos");
                }
            }
        });
    }
});

$(window).on('DOMContentLoaded', function () {
    $(".selector_citas").on("click", function (ev) {
        var page = this.innerHTML;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/dias.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('#lista_citas').empty();
                $('#lista_citas').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#previous").on("click", function (ev) {
        page = $('.page-item.active').text();
        page--;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/dias.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('#lista_citas').empty();
                $('#lista_citas').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#next").on("click", function (ev) {
        page = $('.page-item.active').text();
        page++;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/dias.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('#lista_citas').empty();
                $('#lista_citas').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $(".selector_usuarios").on("click", function (ev) {
        var page = this.innerHTML;
        console.log(page);
        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_usuarios.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#previous_users").on("click", function (ev) {
        page = $('.page-item.active').text();
        page--;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous_users').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous_users').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_usuarios.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#next_users").on("click", function (ev) {
        page = $('.page-item.active').text();
        page++;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous_users').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous_users').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_usuarios.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $(".selector_citas").on("click", function (ev) {
        var page = this.innerHTML;
        console.log(page);
        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_citas.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#previous_citas").on("click", function (ev) {
        page = $('.page-item.active').text();
        page--;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous_citas').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous_citas').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_citas.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $("#next_citas").on("click", function (ev) {
        page = $('.page-item.active').text();
        page++;

        $('.page-item').removeClass('active');
        $('#' + page).addClass('active');
        if (page != 1) {
            $('#previous_citas').removeClass('disabled');

        }
        if (page == 1) {
            $('#previous_citas').addClass('disabled');

        }
        $.ajax({
            type: 'POST',
            url: './funcionalidad/listado_citas.php',
            data: { page: page },
            cache: false,
            success: function (resultado) {

                $('.table').empty();
                $('.table').append(resultado);


            }
        });

    });
});


$(window).on('DOMContentLoaded', function () {
    $("#guardar_usuario").on("click", function (ev) {
        ev.preventDefault();
        var dataForm = $('form').serialize();
       
        $.ajax({
            type: 'POST',
            url: './funcionalidad/insertar_usuario.php',
            data: dataForm,
            cache: false,
            success: function (resultado) {
                $('#modal').show();
                $('.modal-body > p').append("Usuario insertado con éxito");
            }
        });

    });
});

$(window).on('DOMContentLoaded', function () {
    $(".btnCerrarModal").on("click", function (ev) {
        ev.preventDefault();
        location.reload();

    });
});

$(window).on('DOMContentLoaded', function() {
  $('form').on('change', '#select_user', function(ev) {
    var id = $('select[id="select_user"] option:selected').val();
    $.ajax({
      type: 'POST',
      url: './funcionalidad/formulario_usuario.php',
      data: { id: id },
      cache: false,
      success: function(resultado) {
        $('form').empty();
        $('form').append(resultado);
      }
    });
  });
});


$(window).on('DOMContentLoaded', function() {
    
    $("body").on("click","#modificar_usuario", function (ev) {
        
        ev.preventDefault();
        
    var dataForm = $('form').serialize();
    
      $.ajax({
        type: 'POST',
        url: './funcionalidad/modificar_usuario.php',
        data: dataForm,
        cache: false,
        success: function(resultado) {
            console.log(resultado);
        }
      });
    });
  });

  $(window).on('DOMContentLoaded', function() {
    
    $("body").on("click",".eliminar_usuario", function (ev) {
        
        ev.preventDefault();
        var id = this.id;
    
    
      $.ajax({
        type: 'POST',
        url: './funcionalidad/borrado.php',
        data: {id : id},
        cache: false,
        success: function(resultado) {
            $('#modal').show();
            $('.modal-body > p').append(resultado);
        }
      });
    });
  });


  $(window).on('DOMContentLoaded', function() {
    
    $("body").on("click",".eliminar_cita", function (ev) {
        ev.preventDefault();
        var id = this.id;
        var citas = "si";
    
      $.ajax({
        type: 'POST',
        url: './funcionalidad/borrado.php',
        data: {id : id, citas : citas},
        cache: false,
        success: function(resultado) {
            $('#modal').show();
            $('.modal-body > p').append(resultado);
        }
      });
    });
  });