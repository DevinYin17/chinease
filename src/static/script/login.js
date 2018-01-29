$(function() {
  // Default form selector
  var currentFormSelector = '.form-signup';
  // Error field default selector
  var formControlErrorSelector = '.form-control-error';

  var I18N_MAP = {
      zh_cn: {
        'required_field': '请输入该字段',
        'invalid_email_tip': '请输入正确的邮箱地址',
        'invalid_phone_tip': '请输入正确的手机号码',
        'get_code': '获取验证码',
        'get_code_again': 's重新获取'
      },
      en_us: {
        'required_field': 'Please fill in this field',
        'invalid_email_tip': 'Invalid email format',
        'invalid_phone_tip': 'Invalid phone number format',
        'get_code': 'Get verification code',
        'get_code_again': 's重新获取'
      }
  };

  // Set default language
  var language = getQueryString('lang') || Object.keys(I18N_MAP)[0];

  // Required field default error prompt message
  var requiredPromptInfo = I18N_MAP[language]['required_field'];

  // Storage verification code which return from backend api
  var verificationCode = null;

  function getVerificationCode(successCallBack, failedCallBack) {
    $.ajax({
      type: 'GET',
      url: '/captcha/generate',
      dataType: 'json',
      contentType: 'application/json',
      success: function(result) {
        $('.icon-verification-code').attr('src', result.data);
        verificationCode = result.codeId;
        if (typeof successCallBack === 'function') {
          return successCallBack();
        }
      },
      error: function(XMLHttpRequest, errorType, error) {
        if (typeof failedCallBack === 'function') {
          return failedCallBack();
        }
      }
    });
  };

  // Get message authentication code
  var waitTime = 60;
  function getCheckCode(btn) {
    if (waitTime === 0) {
      btn.removeAttr('disabled');
      btn.removeClass('obtaining');
      btn.text(I18N_MAP[language]['get_code']);
      waitTime = 60;
    } else {
      if (waitTime === 60) {
        var selector = currentFormSelector + ' .form-control-phone';
        $(selector).next('span').text('');
        btn.attr('disabled', true);
        btn.addClass('obtaining');
      }
      btn.text(waitTime + I18N_MAP[language]['get_code_again']);
      waitTime--;
      setTimeout(function() {
        getCheckCode(btn);
      }, 1000);
    }
  }

  // Check the field error prompt
  function validationPrompt(element, correct, errorInfo) {
    if (!correct) {
      if (!$(element).next('span').is(formControlErrorSelector)) {
        var appendElement = '<span class=' + formControlErrorSelector.substr(1) + '></span>';
        $(element).after(appendElement);
      }
      $(element).parent().addClass('has-error');
      $(element).next('span').text(errorInfo).show();
    } else {
      $(element).parent().removeClass('has-error');
      $(element).next('span').hide();
    }
  }

  // Ajax request error prompt
  function requestErrorHandler(XMLHttpRequest) {
    var isVerificationError;

    isVerificationError = false;
    if (XMLHttpRequest.status = 440) {
      var response = $.parseJSON(XMLHttpRequest.responseText);
      var resp_message_str = response.message;
      var message_attr = resp_message_str.substring(2, resp_message_str.indexOf(':') - 1);
      var response_message = $.parseJSON(resp_message_str);
      var message = response_message[message_attr];

      validationPrompt($('.form-control-' + message_attr), false, message);

      if (message_attr === 'verification') {
        isVerificationError = true;
      }

      waitTime = 0;
    }

    if (!isVerificationError) {
      getVerificationCode();
    }
  }

  function checkQuestionnaire() {
    var isValid = true;
    // Sources
    var sources = [];
    $('input[name="source"]:checked').each(function() {
      var currentVal = $(this).val();
      if (currentVal === 'others') {
        sources.push($(this).siblings('input').val());
      } else {
        sources.push(currentVal)
      }
    });
    if (sources.length === 0) {
      isValid = false;
      validationPrompt($('.questionnaire-source'), false, requiredPromptInfo);
    }

    // Scale
    var scale = $('input[name="scale"]:checked').val();
    if (!scale) {
      isValid = false;
      validationPrompt($('.questionnaire-scale'), false, requiredPromptInfo);
    }

    // Whether open wp
    var wpopen = $('input[name="wpopen"]:checked').val();
    if (!wpopen) {
      isValid = false;
      validationPrompt($('.questionnaire-wp-open'), false, requiredPromptInfo);
    }

    // WP account number
    var wpfollowers = $('input[name="wpfollowers"]:checked').val();
    if (!wpfollowers) {
      isValid = false;
      validationPrompt($('.questionnaire-wm-account-number'), false, requiredPromptInfo);
    }

    // Interest in products or services
    var interests = $('#interests').val();

    if (isValid) {
      return {
        sources: {
          data: sources,
          type: 'checkbox'
        },
        scale: {
          data: scale,
          type: 'radio'
        },
        wpopen: {
          data: wpopen,
          type: 'radio'
        },
        wpfollowers: {
          data: wpfollowers,
          type: 'radio'
        },
        interests: {
          data: interests,
          type: 'textarea'
        }
      }
    }

    return isValid;
  }

  function init() {
    if (getQueryString('email')) {
      $('.form-control-email').val(getQueryString('email'));
    }

    if (getQueryString('phone')) {
      $('.form-control-phone').val(getQueryString('phone'));
    }

    // Fix input and button height not equal bug in some devices
    window.setTimeout(function() {
      if ($('#getCaptcha').outerHeight() !== $('.form-control-captcha').outerHeight()) {
        $('#getCaptcha').outerHeight($('.form-control-captcha').outerHeight());
      }
    }, 500);

    getVerificationCode();
  }

  // Remove error tip and restore input initial status when focus the input
  $(currentFormSelector + ' input[demanded]').on('focus', function() {
    validationPrompt($(this), true, '');
  })

  // To monitor all necessary fields
  $(currentFormSelector + ' input[demanded]').on('blur', function() {
    var currentFieldVal = $(this).val();

    if (currentFieldVal === '') {
      validationPrompt($(this), false, requiredPromptInfo);
    } else {
      if ($(this).hasClass('form-control-email')) {
        var emailReg = /^([a-zA-Z0-9]+[_|\-|\.]?)*([a-zA-Z0-9])+@([a-zA-Z0-9]+[_|\-|\.]?)*([a-zA-Z0-9])+\.[a-zA-Z]{2,3}$/;

        if (!emailReg.test(currentFieldVal)) {
          validationPrompt($(this), false, I18N_MAP[language]['invalid_email_tip']);
        } else {
          validationPrompt($(this), true);
        }
      } else if ($(this).hasClass('form-control-phone')) {
        var phoneReg = /^0?1[0-9]{10}$/;

        if (!phoneReg.test(currentFieldVal)) {
          validationPrompt($(this), false, I18N_MAP[language]['invalid_phone_tip']);
        } else {
          validationPrompt($(this), true);
        }
      } else {
        validationPrompt($(this), true);
      }
    }
  });

  // Change verification code image
  $('#getVerificationCode').on('click', function(){
    getVerificationCode();
  });

  // Listen to get captcha button
  $('#getCaptcha').on('click', function() {
    var canSend = true;
    var phoneTextSelector = null;
    var verificationTextSelector = null;

    var phoneSelector = '.form-control-phone';
    var phoneNumberVal = $(phoneSelector).val();

    var verificationSelector = '.form-control-verification'
    var code = $(verificationSelector).val();

    if(phoneNumberVal === '') {
      validationPrompt($(phoneSelector), false, requiredPromptInfo);
      canSend = false;
    }

    if(code === '') {
      validationPrompt($(verificationSelector), false, requiredPromptInfo);
      canSend = false;
    }

    if(canSend) {
      phoneTextSelector = currentFormSelector + ' .form-control-phone';
      verificationTextSelector = currentFormSelector + ' .form-control-verification';
      if (!$(phoneTextSelector).parent().hasClass('has-error') && !$(verificationTextSelector).parent().hasClass('has-error')) {
        waitTime = 60;
        getCheckCode($(this));

        // Send ajax request
        $.ajax({
          type: 'POST',
          url: '/captcha/send',
          data: JSON.stringify({
            mobile: phoneNumberVal,
            type: 'signup',
            codeId: verificationCode,
            code: code
          }),
          contentType: 'application/json',
          dataType: 'json',
          success: function(data) {
            if(data.status === 440) {
              // if return error, then restore send captcha btn
              waitTime = 0;
              validationPrompt($(verificationSelector), false, JSON.parse(data.message).verification);
              getVerificationCode();
            }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            // if return error, then restore send captcha btn
            requestErrorHandler(XMLHttpRequest);
          }
        });
      }
    }
  });

  // Click others to show input
  $('#others').on('click', function() {
    if ($(this).is(':checked')) {
      $(this).siblings('input').show();
    } else {
      $(this).siblings('input').hide();
    }
  });

  $('.questionnaire-options').on('click', function() {
    validationPrompt($(this), true);
  })

  var disableChangeWpfollowers = false;
  $('input[name="wpopen"]').click(function() {
    if ($(this).val() === 'no') {
      $('#na').click();
      disableChangeWpfollowers = true;
    } else {
      disableChangeWpfollowers = false;
    }
  });

  $('input[name="wpfollowers"]').click(function(event) {
    if (disableChangeWpfollowers) {
      event.preventDefault();
    }
  });

  // Listen to the form submit button
  $('#submit').on('click', function() {
    $(currentFormSelector + ' input[demanded]').trigger('blur');
    var questionnareResult = checkQuestionnaire();
    if (!$(currentFormSelector + ' div.has-error').length && questionnareResult) {
      var name = $('.form-control-name').val();
      var email = $('.form-control-email').val();
      var company = $('.form-control-company').val();
      var phone = $('.form-control-phone').val();
      var captcha = $('.form-control-captcha').val();
      var position = $('.form-control-position').val();

      // Send ajax request
      $('#submit').addClass('pure-button-disabled');
      $.ajax({
        type: 'POST',
        url: '/user/register',
        data: JSON.stringify({
          name: name,
          email: email,
          position: position,
          company: company,
          phone: phone,
          captcha: captcha,
          'questionnaire-form': questionnareResult
        }),
        contentType: 'application/json',
        dataType: 'json',
        success: function(data) {
          $('#submit').removeClass('pure-button-disabled');
          if (data.status === 440) {
            var message = JSON.parse(data.message);
            for (var errorKey in message) {
              validationPrompt($('.form-control-' + errorKey), false, message[errorKey]);
            }
            getVerificationCode();
          } else if (data.status === 500) {
            window.alert(data.message);
          } else {
            if (getQueryString('from') === 'wechat') {
              location.href = '/message?from=wechat';
            } else {
              location.href = '/message';
            }
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          $('#submit').removeClass('pure-button-disabled');
          requestErrorHandler(XMLHttpRequest);
        }
      });
    }
  });

  init();
});
