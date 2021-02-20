$(document).ready(function(){

    function CountryByCity() {
        $(document).ready(function(){
            jQuery('#country').change(function(){
                var id=jQuery(this).val();
                if(id=='-1'){
                    jQuery('#city').html('<option value="-1">Select city</option>');
                }else{
                    // $("#divLoading").addClass('show');
                    jQuery('#city').html('<option value="-1">Select city</option>');
    
                    jQuery.ajax({
                        type:'post',
                        url:'get_city.php',
                        data:'id='+id+'&type=city',
                        success:function(result){
                            // $("#divLoading").removeClass('show');
                            jQuery('#city').append(result);
                        }
                    });
                }
            });
        });
    }

    function abroadPassport() {
        var txt1 = $("<label></label>").text("საზღვარგარეთის პასპორტი");
        var txt2 = $("<input type='text' id='abroad_passport' name='abroad_passport'></input>");  
        $(".new").append(txt1, txt2);   
      }

    function getIdNumberLength() {
        $("#id_number").change(function(){
            var str = $("#id_number").val();
            if(str.length != 11) {
                alert("piradi nomeri unda iyos 11 is toli !!!");
            } else {
            let result = [];
            let sentence = str;
            let words = sentence.split(/(.{2})/).filter(O=>O)
            result = words;

            if(result[0] != 01) {
                var txt1 = $("<label id='phisical_address_label'></label>").text("ფიზიკური მისამართი");
                var txt2 = $("<input type='text' id='phisical_address' name='phisical_address'></input>"); 
                $(".phisical_address").append(txt1, txt2);  
            } else {
                $('#phisical_address').prop('required',false);
                $('#phisical_address_label').remove();
                $('#phisical_address').remove();
            }
            }
        });
    }
      
    function getSelectedCountry() {
        $("select.country").change(function(){
            var selectedCountry = $(this).children("option:selected").text();
            if(selectedCountry != "Georgia") {
                $('#phisical_address').prop('required',false);
                $('#phisical_address_label').remove();
                $('#phisical_address').remove();
                $('#id_number').prop('required',false);
                abroadPassport();
            }
            
            if(selectedCountry == "Georgia") { 
                $('#id_number').prop('required',true);
                getIdNumberLength();
                $('#abroad_passport').remove();
            }
        });
    }

    function HideOrShow() {
        $(function() {
            $('#faq').click(function() {
               $('#hidden').toggle();
               return false;
            });
         });   
    }

    function terms() {
        $(function() {
            $('.acceptsubmit').click(function() {
                if($('.accept').prop('checked') != true) {
                    alert('გთხოვთ დაეთანხმოთ პირობებს');
                }
            });
         }); 
         
      }

    function scrollToAccept() {
        const terms = document.querySelector('.terms-and-conditions');
        const button = document.querySelector('.accept');
        if (!terms) {
          return; 
        }
      
        function obCallback(payload) {
      
          if (payload[0].intersectionRatio === 1) {
            button.disabled = false;
            ob.unobserve(terms.lastElementChild);
          }
        }
      
        const ob = new IntersectionObserver(obCallback, {
          root: terms,
          threshold: 1,
        });
      
        ob.observe(terms.lastElementChild);
      }

    CountryByCity();
    getSelectedCountry(); 
    HideOrShow();
    scrollToAccept();
    terms();
    
});

jQuery.validator.addMethod("customEmail", function(value, element) { 
    return this.optional( element ) || /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value ); 
}, "გთხოვთ შეიყვანოთ სწორი მეილი!");

jQuery.validator.addMethod("customPassword", function(value, element) {
    var x = null;
    return this.optional( element ) || /[!"#$%&'()*+,-.:;<=>?@[\]^_`{|}~]/.test( value );
    
  }, x = [
    "* პაროლი უნდა მოიცავდეს მინიმუმ 8 სიმბოლოს<br>",
    "* აუცილებლად უნდა იყოს სიმბოლო მაღალ რეგისტრში<br>",
    "* აუცილებლად უნდა შეიცავდეს სპეც. სიმბოლოს (+,_-/!@#$).<br>"
]);

var $registrationForm = $('#registration');
if($registrationForm.length){
  $registrationForm.validate({
      
      rules:{
        name: {
            required: true,
        },
        surname: {
            required: true,
        },
        birthdate: {
            required: true,
        },
        sex: {
            required: true,
        },
        address: {
            required: true, 
        },
        phone: {
            required: true,
        },
        sel_depart: {
            required: true,
        },
        sel_user: {
            required: true,
        },
        email: {
            required: true,
            customEmail: true
        },
        password: {
            required: true,
            customPassword: true
        },
        abroad_passport: {
            required: true,
        },
        phisical_address: {
            required: true,
        },

        check: {
            required: true,
        }
      },
      messages:{
          name: {
              required: 'გთხოვთ შეიყვანოთ სახელი!'
          },
          surname: {
              required: 'გთხოვთ შეიყვანოთ გვარი!',
          },
          birthdate: {
              required: 'გთხოვთ შეიყვანოთ დაბადების თარიღი!'
          },
          sex: {
            required: 'გთხოვთ აირჩიოთ სქესი!',
          },
          address: {
              required: 'გთხოვთ შეიყვანოთ მისამართი',
          },
          phone: {
              required: 'გთხოვთ შეიყვანოთ ტელეფონის ნომერი'
          },
          sel_depart: {
              required: 'გთხოვთ აირჩიოთ ქვეყანა!'
          },
          sel_user: {
              required: 'გთხოვთ აირჩიოთ ქალაქი'
          },
          email: {
              required: 'გთხოვთ შეიყვანოთ მეილი',
          },
          password: {
            required: 'გთხოვთ შეიყვანოთ პაროლი!',
          },
          id_number: {
            required: 'გთხოვთ შეიყვანოთ პირადობის ნომერი'
          },
          abroad_passport: {
            required: 'გთხოვთ შეიყვანოთ საზღვარგარეთის პასპორტი'
          },
          phisical_address: {
            required: 'გთხოვთ შეიყვანოთ ფიზიკური მისამართი'
          },
          check: {
            required: 'გთხოვთ დაეთანხმეთ პირობებს!'
          },
      },
    errorElement: "div",
    errorPlacement: function(error, element) {
        offset = element.offset();
        error.insertBefore(element)
        error.addClass('message');  
        error.css('color', 'red');
        error.css('font-size','16px');
        error.css('font-weight','bold');
    }
  });
}