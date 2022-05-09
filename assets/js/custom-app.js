(function (window, document, $, undefined) {

    $(function () {
    //   $.validator.setDefaults({
    //     submitHandler: function () {
    //       alert("submitted!");
    //     }
    //   });  
      $(document).ready(function () {
        $("#renterForm").validate({
          rules: {
            renterName: "required",
            familyMembers: "required",
            renterPhone: {
              required: true,
              minlength: 11
            },
            renterEmail: {
              required: true,
              email: true
            },
            renterAddress: {
              required: true
            },
            renterNID: {
              required: true
            },
            // renterImage: {
            //   required: true,
            //   extension: "jpg|jpeg|png|svg"
            // }
          },
          messages: {
            renterName: "Please enter renter's full name",
            familyMembers: "Please enter renter's family members",
            renterPhone: {
              required: "Please enter renter's phone number",
              minlength: "Renter's phone number must consist of at least 11 characters"
            },
            renterEmail: "Please provide renter's email address",
            renterAddress: {
              required: "Please provide renter's address"
            },
            renterNID: "Please provide renter's NID number",
            // renterImage: {
            //   required: "Please provide a renter's image",
            //   extension: "Please upload jpg,jpeg,png,svg file only"
            // }
          },
          errorElement: "em",
          errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");
  
            if (element.prop("type") === "checkbox") {
              error.insertAfter(element.parent("label"));
            } else {
              error.insertAfter(element);
            }
          },
          highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-error").removeClass("has-success");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-success").removeClass("has-error");
          }
        });
  
      });  

      $(document).ready(function () {
        $("#userForm").validate({
          rules: {
            userFName: "required",
            userLName: "required",
            userAddress: "required",
            userGender: "required",
            userDOB: "required",
            userPhone: {
              required: true,
              minlength: 14
            },
            userEmail: {
              required: true,
              email: true
            },
            username: {
              required: true
            },
            password: {
              required: true
            },
          },
          messages: {
            userFName: "Please enter user's first name",
            userLName: "Please enter user's last name",
            userAddress: "Please enter user's address",
            userGender: "Please enter user's gender",
            userDOB: "Please enter user's date of birth",
            renterPhone: {
              required: "Please enter user's phone number",
              minlength: "User's phone number must consist of minimum 14 characters"
            },
            userEmail: {
              required: "Please provide user's email address",
              email: "Email is incorrect! (e.g. 'example@example.com')"
            },
            username: {
              required: "Please provide username"
            },
            password: {
              required: "Please provide password",
            },
          },
          errorElement: "em",
          errorPlacement: function (error, element) {
            // Add the `help-block` class to the error element
            error.addClass("help-block");
  
            if (element.prop("type") === "checkbox") {
              error.insertAfter(element.parent(".input-group"));
            } else {
              error.insertAfter(element.parents(".input-group"));
            }
          },
          highlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-error").removeClass("has-success");
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".col-sm-12").addClass("has-success").removeClass("has-error");
          }
        }); 
        

        $('#confirmPassword').keyup(function(){
          var pwd = $('#password').val();
          var cpwd = $('#confirmPassword').val();

          if(cpwd != pwd){
            // $('#password-match-error').html('Password is not matching');
            $(".password-match-error").html("<i class='fa fa-remove mr-2'></i> Password is not matching");
            $(".password-match-error").css("color","red");
            return false;
          }
          else{
            //$('#password-match-error').html('Password has been matched!');
            $(".password-match-error").html("<i class='fa fa-check mr-2'></i> Password has been matched!");
            $('.password-match-error').css('color','green');
            return true;
          }
        });
        
        
        $("#password").keyup(function(){
          var upperCase = new RegExp('[A-Z]');
          var numbers = new RegExp('[0-9]');
          var password = $(this).val();

            //length
            if(password.length >= 8){
              $(".maxLength").html("<i class='fa fa-check mr-2'></i> 8 Charecters Length");
              $(".maxLength").css("color","green");
            }
            else{
              $(".maxLength").html("<i class='fa fa-remove mr-2'></i> 8 Charecters Length");
              $(".maxLength").css("color","red");
            }
            //uppercase
            if(password.match(upperCase)){
              $(".upCase").html("<i class='fa fa-check mr-2'></i> 1 Uppercase Letter (A - Z)");
              $(".upCase").css("color","green");
            }
            else{
              $(".upCase").html("<i class='fa fa-remove mr-2'></i> 1 Uppercase Letter (A - Z)");
              $(".upCase").css("color","red");
            }
            //numbers
            if(password.match(numbers)){
              $(".oneNumber").html("<i class='fa fa-check mr-2'></i> 1 Number (0 - 9)");
              $(".oneNumber").css("color","green");
            }
            else{
              $(".oneNumber").html("<i class='fa fa-remove mr-2'></i> 1 Number (0 - 9)");
              $(".oneNumber").css("color","red");
            }
            //special
            if(/^[a-zA-Z0-9- ]+$/.test(password) == false){
              $(".oneSpecial").html("<i class='fa fa-check mr-2'></i> 1 Special Charecters (!@#%&*?/)");
              $(".oneSpecial").css("color","green");
            }
            else{
              $(".oneSpecial").html("<i class='fa fa-remove mr-2'></i> 1 Special Charecters (!@#%&*?/)");
              $(".oneSpecial").css("color","red");
            }

            //password strength start
            if(password.length > 12){
              $(".strongLength").removeClass("bg-default").addClass("bg-success");
            }           
            if((password.length <= 12) && (password.length >= 8)){
              $(".mediamLength").removeClass("bg-default").addClass("bg-warning");
            }           
            if((password.length < 8) && (password.length > 4)){
              $(".weekLength").removeClass("bg-default").addClass("bg-danger");
            }
          
        });


        $('.email_id').keyup(function(){
          var email = $('.email_id').val();  

          $.ajax({
            type: "POST",
            url: "userCode.php",
            data: {
              'checkEmail': 1,
              'email': email,
            },
            success: function(response){
              $('#email-match-error').text(response);
              $('#email-match-error').css('display','block');
              if(response == 'Email is Available!'){
                $('#email-match-error').css('color','green');
              }
              else{
                $('#email-match-error').css('color','red');
              }
            }
          });
        }),


        $('.username').keyup(function(){
          var username = $('.username').val();

          $.ajax({
            type: "POST",
            url: "userCode.php",
            data: {
              'checkUsername': 1,
              'username': username,
            },
            success: function(response){
              $('#username-match-error').text(response);
              $('#username-match-error').css('display','block');
              if(response == 'Username is Available!'){
                $('#username-match-error').css('color','green');
              }
              else{
                $('#username-match-error').css('color','red');
              }
            }
          });
        });


        $("#userImage").change(function(){
          var file = this.files[0];
          var fileType = file.type;
          var match = ['image/jpeg','image/jpg','image/png','image/svg'];

          if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]))){
            $('#image-match-error').html('Sorry! only JPEG, JPG, PNG, SVG files are allowed to upload');
            //$("#userImage").val('');
            return false;
          }
        });






        $("#rentActual, #rentServiceCharge").keyup(function(){
          var total = 0;
          var x = Number($("#rentActual").val());
          var y = Number($("#rentServiceCharge").val());
          var total = x + y;

          $("#rentTotal").val(total);
        });






        $("#billElectricity, #billGas, #billWater, #billInternet").keyup(function(){
          var total = 0;
          var a = Number($("#billElectricity").val());
          var b = Number($("#billGas").val());
          var c = Number($("#billWater").val());
          var d = Number($("#billInternet").val());
          var total = a + b + c + d;

          $("#billTotal").val(total);
        });
  
      });  
    });
  
  })(window, document, window.jQuery);

  (function (window, document, $, undefined) {

    $(function () {
      $('#entry-date').datepicker({
        format: 'dd-mm-yyyy',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#leave-date').datepicker({
        format: 'dd-mm-yyyy',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#birth-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      

      $('#rent-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#rent-month').datepicker({
        format: 'MM yyyy',
        startView: 'months', 
        minViewMode: 'months',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      

      $('#bill-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#bill-month').datepicker({
        format: 'MM yyyy',
        startView: 'months', 
        minViewMode: 'months',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      

      $('#expense-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#expense-month').datepicker({
        format: 'MM yyyy',
        startView: 'months', 
        minViewMode: 'months',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#from-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

      $('#to-date').datepicker({
        format: 'yyyy-mm-dd',
        orientation: "bottom left",
        todayHighlight: true,
        autoclose: true,
        templates: {
          leftArrow: '<i class="fa fa-angle-left"></i>',
          rightArrow: '<i class="fa fa-angle-right"></i>'
        }
      });

    });
  
  })(window, document, window.jQuery);


