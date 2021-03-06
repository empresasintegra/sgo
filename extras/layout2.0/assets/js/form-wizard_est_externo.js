var FormWizard = function () {
	"use strict";
    var wizardContent = $('#wizard');
    var wizardForm = $('#form');
    var numberOfSteps = $('.swMain > ul > li').length;
    var initWizard = function () {
        // function to initiate Wizard Form
        wizardContent.smartWizard({
            selected: 0,
            keyNavigation: false,
            onLeaveStep: leaveAStepCallback,
            onShowStep: onShowStep,
        });
        var numberOfSteps = 0;
        animateBar();
        initValidator();
    };
    var animateBar = function (val) {
        if ((typeof val == 'undefined') || val == "") {
            val = 1;
        };
        
        var valueNow = Math.floor(100 / numberOfSteps * val);
        $('.step-bar').css('width', valueNow + '%');
    };
    var validateCheckRadio = function (val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
			$(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").remove().end().find('.symbol').addClass('ok');
		});
    };    
    var initValidator = function () {
        $.validator.addMethod("cardExpiry", function () {
            //if all values are selected
            if ($("#card_expiry_mm").val() != "" && $("#card_expiry_yyyy").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Please select a month and year');
        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
                    error.appendTo($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: ':hidden',
            rules: {
                username: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    minlength: 6,
                    required: true
                },
                password_again: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                full_name: {
                    required: true,
                    minlength: 2,
                },
                phone: {
                    required: true
                },
                gender: {
                    required: true
                },
                address: {
                    required: true
                },
                city: {
                    required: true
                },
                country: {
                    required: true
                },
                card_name: {
                    required: true
                },
                card_number: {
                    minlength: 16,
                    maxlength: 16,
                    required: true
                },
                card_cvc: {
                    digits: true,
                    required: true,
                    minlength: 3,
                    maxlength: 4
                },
                card_expiry_yyyy: "cardExpiry",
                payment: {
                    required: true,
                    minlength: 1
                }
            },
            messages: {
                firstname: "Please specify your first name"
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    };
    var displayConfirm = function () {
        $('.display-value', form).each(function () {
            var input = $('[name="' + $(this).attr("data-display") + '"]', form);
            if (input.attr("type") == "text" || input.attr("type") == "email" || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") || input.is(":checkbox")) {

                $(this).html(input.filter(":checked").closest('label').text());
            } else if ($(this).attr("data-display") == 'card_expiry') {
                $(this).html($('[name="card_expiry_mm"]', form).val() + '/' + $('[name="card_expiry_yyyy"]', form).val());
            }
        });
    };
    var onShowStep = function (obj, context) {
    	if(context.toStep == numberOfSteps){
    		$('.anchor').children("li:nth-child(" + context.toStep + ")").children("a").removeClass('wait');
            displayConfirm();
    	}
        $(".next-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goForward");
        });
        $(".back-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goBackward");
        });
        $(".finish-step").unbind("click").click(function (e) {
            e.preventDefault();
            onFinish(obj, context);
        });
    };
    var leaveAStepCallback = function (obj, context) {
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onFinish = function (obj, context) {
        if (validateAllSteps()) {
            //alert('form submit function');
            var form = $( '#form' );
            var formulario = new Object();

            formulario.codigo_requerimiento = form.find("input[name='codigo_requerimiento']").val();
            formulario.n_solicitud = form.find("input[name='n_solicitud']").val();
            formulario.f_solicitud = form.find("input[name='f_solicitud']").val();
            //formulario.select_empresa = form.find("select[name='select_empresa']").val();
            formulario.select_regimen = form.find("select[name='select_regimen']").val();
            formulario.select_planta = form.find("select[name='select_planta']").val();
            formulario.causal = form.find("input[name='causal']").val();
            formulario.motivo = form.find("input[name='motivo']").val();
            formulario.fdesde = form.find("input[name='fdesde']").val();
            formulario.fhasta = form.find("input[name='fhasta']").val();
            formulario.comentarios = form.find("textarea[name='comentarios']").val();
            var json = JSON.stringify(formulario);
            var posting = $.post( base_url + "est/requerimiento/guardar_req",{basico : json});
            //alert(posting);
            //select_empresa = form.find("select[name='select_empresa']").val();
            // Put the results in a div
            posting.done(function( data ) {
                var id_requerimiento = data;
                var len = $("#form input[name='areas_cargos[]']").length;
                $("#form input[name='areas_cargos[]']").each(function(i,value){
                    var salida = $(this).val()+'-'+ $(this).data('val');
                    alert("Cantidad - Cargo - Area: "+salida+" Agregado Exitosamente");
                    var posting2 = $.post( base_url + "est/requerimiento/guardar_area_cargo/" + salida + "-"+id_requerimiento,function(){ toastr.info("Guardando Requerimiento"); });
                    posting2.done(function( data ) {
                        console.log(data);
                        if (i == len - 1) {
                            //toastr.info("Requerimiento Guardado");
                            alert("Requerimiento Guardado Exitosamente");
                            window.location=base_url+"usuarios/home";
                        }
                    });
                });
            });
            
            $('.anchor').children("li").last().children("a").removeClass('wait').removeClass('selected').addClass('done').children('.stepNumber').addClass('animated tada');
            
           //wizardForm.submit();
        }
    };
    var validateSteps = function (stepnumber, nextstep) {
        var isStepValid = false;
        if(stepnumber == 1){
            var form = $( '#form' );
            var nom_solicitud = form.find("input[name='n_solicitud']").val();
            var text_empresa = form.find("select[name='select_empresa'] option:selected").text();
            var text_planta = form.find("select[name='select_planta'] option:selected").text();
            $("#step-2 h4").html('<b>Empresa:</b> '+text_empresa+' - <b>Unidad de Negocio:</b> '+text_planta+' - <b>Requerimiento:</b> '+nom_solicitud);
        }
        if(stepnumber == 2){ //METIENDO MANO!!!
            var form = $( '#form' );
            var formulario = new Object();
            var areas = [];
            var cargo = [];
            var personas = [];
             $("#form input[name='areas[]']").each(function(i,value){
                if (this.checked) {
                    areas.push( $(this).val() );
                }
            }).promise().done(function () {
                formulario.areas = areas;
            });
            $("#form input[name='cargos[]']").each(function(i,value){
                if (this.checked) {
                    cargo.push( $(this).val() );
                }
            }).promise().done(function () {
                formulario.cargo = cargo;
            });
            /*
            $("#form input[name='personas[]']").each(function(i,value){
                personas.push( $(this).val() );
            }).promise().done(function () {
                formulario.personas = personas;
            });*/
            formulario.n_solicitud = form.find("input[name='n_solicitud']").val();
            formulario.f_solicitud = form.find("input[name='f_solicitud']").val();
            formulario.select_empresa = form.find("select[name='select_empresa']").val();
            formulario.select_regimen = form.find("select[name='select_regimen']").val();
            formulario.select_planta = form.find("select[name='select_planta']").val();
            formulario.causal = form.find("input[name='causal']").val();
            formulario.fdesde = form.find("input[name='fdesde']").val();
            formulario.fhasta = form.find("input[name='fhasta']").val();
            formulario.comentarios = form.find("input[name='comentarios']").val();

            var text_empresa = form.find("select[name='select_empresa'] option:selected").text();
            var text_planta = form.find("select[name='select_planta'] option:selected").text();
            var nom_solicitud = form.find("input[name='n_solicitud']").val();

            var json = JSON.stringify(formulario);
           /*  var categoryattributelist = "";
           
            $.ajax({
                async: false,
                url: base_url + "est/requerimiento/guardar_vista_previa2",
                data: {json:json},
                type: "post",
                //contentType: "application/json; charset=utf-8",
                dataType: "json",
                error:function(msg){
                    alert(msg)
                },
                success: function (msg) { 
                    alert(msg);
                    //categoryattributelist = msg; 
                    $("#step-3 h4").html('<b>Empresa:</b> '+text_empresa+' - <b>Unidad de Negocio:</b> '+text_planta+' - <b>Requerimiento:</b> '+nom_solicitud);
                },
                //error: function (msg) { categoryattributelist = msg; }
            });
            /*
            $("#planilla_example1").handsontable({
                height: 200,
                data: categoryattributelist,
                rowHeaders: false,
                colHeaders: false,
                minSpareRows: 0,
                contextMenu: true,
                comments: false,
                fixedColumnsLeft: 1,
                fixedColumnsTop: 1,
                stretchH: "all",
                renderer: "html",
              });*/
            var posting = $.post( base_url + "est/requerimiento/guardar_vista_previa",{json : json});
            
            // Put the results in a div
            posting.done(function( d ) {
                $("#json_planilla_asd").html(d);
                $("#datatable").dataTable( {
                    scrollY:        "300px",
                    scrollX:        true,
                    scrollCollapse: true,
                    paging:         false,
                    fixedColumns:   true
                });
                $("#step-3 h4").html('<b>Empresa:</b> '+text_empresa+' - <b>Unidad de Negocio:</b> '+text_planta+' - <b>Requerimiento:</b> '+nom_solicitud);
            });

        }
        
        if (numberOfSteps >= nextstep && nextstep > stepnumber) {
        	
            // cache the form element selector
            if (wizardForm.valid()) { // validate the form
                wizardForm.validate().focusInvalid();
                for (var i=stepnumber; i<=nextstep; i++){
        		$('.anchor').children("li:nth-child(" + i + ")").not("li:nth-child(" + nextstep + ")").children("a").removeClass('wait').addClass('done').children('.stepNumber').addClass('animated tada');
        		}
                //focus the invalid fields
                animateBar(nextstep);
                isStepValid = true;
                return true;
            };
        } else if (nextstep < stepnumber) {
        	for (i=nextstep; i<=stepnumber; i++){
        		$('.anchor').children("li:nth-child(" + i + ")").children("a").addClass('wait').children('.stepNumber').removeClass('animated tada');
        	}
            
            animateBar(nextstep);
            return true;
        } 
    };
    var validateAllSteps = function () {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    };
    return {
        init: function () {
            initWizard();
            validateCheckRadio();
        }
    };
}();