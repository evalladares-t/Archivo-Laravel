
        /*Buscador*/

        var busqueda = document.getElementById('Buscador');
        var table = document.getElementById("tabla").tBodies[0];
    
        buscaTabla = function(){
          texto = busqueda.value.toLowerCase();
          var r=0;
          while(row = table.rows[r++])
          {
            if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
              row.style.display = null;
            else
              row.style.display = 'none';
          }
        }
    
        busqueda.addEventListener('keyup', buscaTabla);

    //Perfil:
        function ModalInfoP(xd){            
            $('#modal-info-perfil').modal('show')            
            var xxx = xd;            
            var form=$('#form-info-profile');            
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize();           
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#contenido_info').html("Nombre del privilegio: " +"<br>"+ "<p style='margin-left:10%'>"+result.name_perfil+'</p>'+
                    "Fecha de creación: "+"<br>"+"<p style='margin-left:10%'>"+result.fecha_creacion+'</p>'+"Fecha de la última actualización:"+
                    "<br>"+"<p style='margin-left:10%'>"+result.fecha_modificacion+"</p>"+"Cantidad de privilegios:"+"<br>"+"<p style='margin-left:10%'>"+result.permiss)                                

                },
                error: $('#contenido_info').html("error")
            });            
        }

        function ModalEditP(mm){            
            $('#modal-edit-perfil').modal('show')            
            var xxx = mm;            
            var form=$('#form-edit-profile');            
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#id_perfil').val(result.id),
                    $('#inputEditProfile').val(result.name_perfil),
                    $('#gPerfilCbEx').prop('checked',result.gPerfilCbAj!=0?true:false),
                    $('#gUsuarioCbEx').prop('checked',result.gUsuarioCbAj!=0?true:false),
                    $('#gArchivoCbEx').prop('checked',result.gArchivoCbAj!=0?true:false),
                    $('#gAudioCbEx').prop('checked',result.gAudioCbAj!=0?true:false),
                    $('#gTomoCbEx').prop('checked',result.gTomoCbAj!=0?true:false),
                    $('#gPlanoCbEx').prop('checked',result.gPlanoCbAj!=0?true:false),
                    $('#gMiACbEx').prop('checked',result.gMiACbAj!=0?true:false),
                    $('#gMsACbEx').prop('checked',result.gMsACbAj!=0?true:false),
                    $('#gGsCbEx').prop('checked',result.gGsCbAj!=0?true:false),
                    $('#gMuTCbEx').prop('checked',result.gMuTCbAj!=0?true:false),
                    $('#gMsDCbEx').prop('checked',result.gMsDCbAj!=0?true:false),

                    $('#gMsBcBEx').prop('checked',result.gMsBcBEAj!=0?true:false),

                    $('#gMaACbEx').prop('checked',result.gMaACbAj!=0?true:false),
                    $('#gMdACbEx').prop('checked',result.gMdACbAj!=0?true:false),
                    $('#gRaCbEx').prop('checked',result.gRaCbAj!=0?true:false),
                    $('#gRsCbEx').prop('checked',result.gRsCbAj!=0?true:false),
                    $('#gRrACbEx').prop('checked',result.gRrACbAj!=0?true:false),
                    $('#gRrPCbEx').prop('checked',result.gRrPCbAj!=0?true:false)
                    
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ActualizaDataP(){            
            $('#modal-edit-perfil').modal('show');          
            var form=$('#form-update-profile'); 
            var xxx=$('#id_perfil').val();
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#modal-edit-perfil').modal('hide'),
                    location.reload()             
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ModelEliminarP(xx){
            $('#modal-delete-perfil').modal('show')   
            $('#id_perfilE').val(xx);
        }

        function EliminarPerfil(){
            var yy=$('#id_perfilE').val();
            var form=$('#form-delete-profile'); 
            var urlx = form.attr('action').replace('valor',yy);
            var datax = form.serialize(); 

            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){   
                    $('#modal-delete-perfil').modal('hide');
                    location.reload()
                },
                error: $('#contenido_info').html("error")
            });          
        }

    //Usuario:

        function ModelEliminarU(xx){
            $('#modal-delete-usuario').modal('show')   
            $('#id_usuarioE').val(xx);
        }

        function EliminarUsuario(){
            var yy=$('#id_usuarioE').val();
            var form=$('#form-delete-user'); 
            var urlx = form.attr('action').replace('valor',yy);
            var datax = form.serialize(); 

            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){   
                    //$('#modal-delete-user').modal('hide');
                    location.reload()
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ModelInfoU(xd){            
            $('#modal-info-user').modal('show')            
            var xxx = xd;            
            var form=$('#form-info-user');            
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize();           
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#contenido_info').html("Nombre del usuario: " +"<br>"+ "<p style='margin-left:10%'>"+result.name+'</p>'+
                    "Fecha de creación: "+"<br>"+"<p style='margin-left:10%'>"+result.fecha_creacion+'</p>'+"Fecha de la última actualización:"+
                    "<br>"+"<p style='margin-left:10%'>"+result.fecha_modificacion+"</p>"+"Perfil:"+"<br>"+"<p style='margin-left:10%'>"+result.profile+"<br><br>"+"<img style='margin-left:15%; width:15em; border-radius:20%'src='img/usuarios/"+result.imgURL+"'>")

                },
                error: $('#contenido_info').html("error")
            });            
        }
        
        function ModalEditU(mm){            
            $('#modal-edit-user').modal('show')            
            var xxx = mm;            
            var form=$('#form-edit-user');            
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#id_userE').val(result.id),
                    $('#name_userE').val(result.name),
                    $('#dni_userE').val(result.dni),
                    $('#userE').val(result.name_user)
                    //$('#estado').val(result.estado)
                    //$('#profile_user').val(result.profile)
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ActualizaDataU(){            
            $('#modal-edit-user').modal('show');          
            var form=$('#form-update-user'); 
            var xxx=$('#id_userE').val();
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#modal-edit-user').modal('hide'),
                    location.reload()             
                },
                error: $('#contenido_info').html("error")
            });          
        }

    //Shelf

        function ModelEliminarShelf(xx){
            $('#modal-delete-shelf').modal('show')   
            $('#id_shelf_id').val(xx);
        }

        function EliminarShelf(){
            var yy=$('#id_shelf_id').val();
            var form=$('#form-delete-shelf'); 
            var urlx = form.attr('action').replace('valor',yy);
            var datax = form.serialize(); 

            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){   
                    location.reload()
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ModalEditShelf(mm){            
            $('#modal-edit-shelf').modal('show')            
            var xxx = mm;            
            var form=$('#form-edit-shelf');            
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    $('#idShelfE').val(result.id),
                    $('#name_numberE').val(result.number),
                    $('#inventaryE').val(result.inventory),
                    $('#referenceE').val(result.reference),
                    $('#observationE').val(result.observation)
                    //$('#state_shelfE').val(result.state)
                },
                error: $('#contenido_info').html("error")
            });          
        }

        function ActualizaDataShelf(){            
            //$('#modal-edit-user').modal('show');          
            var form=$('#form-update-shelf'); 
            var xxx=$('#idShelfE').val();
            var urlx = form.attr('action').replace('valor',xxx);            
            var datax = form.serialize(); 
            $.ajax({
                url: urlx,
                type: 'POST',            
                data: datax,
                success: function(result){
                    //$('#modal-edit-user').modal('hide'),
                    location.reload()             
                },
                error: $('#contenido_info').html("error")
            });          
        }

    //conservatioType

    function ModelEliminarCT(xx){
        $('#modal-delete-CT').modal('show')   
        $('#id_CT_id').val(xx);
    }

    function EliminarCT(){
        var yy=$('#id_CT_id').val();
        var form=$('#form-delete-CT'); 
        var urlx = form.attr('action').replace('valor',yy);
        var datax = form.serialize(); 

        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){   
                location.reload()
            },
            error: $('#contenido_info').html("error")
        });          
    }

    function ModalEditCT(mm){            
        $('#modal-edit-CT').modal('show')            
        var xxx = mm;            
        var form=$('#form-edit-CT');            
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){
                $('#name_numberCTE').val(result.id),
                $('#nameCTE').val(result.name),
                $('#observationCTE').val(result.observation)
            },
            error: $('#contenido_info').html("error")
        });          
    }

    function ActualizaDataCT(){            
        //$('#modal-edit-user').modal('show');          
        var form=$('#form-update-CT'); 
        var xxx=$('#name_numberCTE').val();
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){
                //$('#modal-edit-user').modal('hide'),
                location.reload()             
            },
            error: $('#contenido_info').html("error")
        });     
    }

    //Secciones
    function ModelEliminarSecciones(xx){
        $('#modal-delete-section').modal('show')   
        $('#id_section_id').val(xx);
    }

    function EliminarSection(){
        var yy=$('#id_section_id').val();
        var form=$('#form-delete-section'); 
        var urlx = form.attr('action').replace('valor',yy);
        var datax = form.serialize(); 

        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){   
                location.reload()
            },
            error: $('#contenido_info').html("error")
        });          
    }

    function ModalEditSection(mm){            
        $('#modal-edit-section').modal('show')            
        var xxx = mm;            
        var form=$('#form-edit-section');            
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){
                $('#id_secctionE').val(result.id),
                $('#code_secctionE').val(result.code),
                $('#name_secctionE').val(result.name),
                $('#acronym_sectionE').val(result.acronym),
                $('#observation_secctionE').val(result.observation)
            },
            error: $('#contenido_info').html("error")
        });          
    }
    
    function ActualizaDataCT(){            
        //$('#modal-edit-user').modal('show');          
        var form=$('#form-update-section'); 
        var xxx=$('#id_secctionE').val();
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){
                //$('#modal-edit-user').modal('hide'),
                location.reload()             
            },
            error: $('#contenido_info').html("error")
        });     
    }

    //SubSecciones

    function ModelEliminarSubSecciones(xx){
        $('#modal-delete-subsection').modal('show')   
        $('#id_subsection_id').val(xx);
    }

    function EliminarSubSection(){
        var yy=$('#id_subsection_id').val();
        var form=$('#form-delete-subsection'); 
        var urlx = form.attr('action').replace('valor',yy);
        var datax = form.serialize(); 

        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){   
                location.reload()
            },
            error: $('#contenido_info').html("error")
        });          
    }

    function ModelEditSubSecciones(mm){            
        $('#modal-update-subsection').modal('show')            
        var xxx = mm;            
        var form=$('#form-edit-subsection');            
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){

                $('#id_subsecctionE').val(result.id),
                $('#code_subsecctionE').val(result.code),
                $('#name_subsecctionE').val(result.name),
                $('#acronym_subsectionE').val(result.acronym),
                $('#observation_subsecctionE').val(result.observation)
            },
            error: $('#contenido_info').html("error")
        });          
    }

    function ActualizaDataSubsection(){            
        //$('#modal-edit-user').modal('show');          
        var form=$('#form-update-subsection'); 
        var xxx=$('#id_subsecctionE').val();
        var urlx = form.attr('action').replace('valor',xxx);            
        var datax = form.serialize(); 
        $.ajax({
            url: urlx,
            type: 'POST',            
            data: datax,
            success: function(result){
                //$('#modal-edit-user').modal('hide'),
                location.reload()             
            },
            error: $('#contenido_info').html("error")
        });     
    }
