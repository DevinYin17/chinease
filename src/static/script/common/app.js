$(function() {

  function initUser() {
    var user = localStorageService.getItem('user');
    if (user.email && user.token) {
      $('.signup').html(user.email);
      $('.signup').addClass('online');

      document.cookie = 'token=' + user.token;
    }
  }

  function initMask() {
    $('.modal .mask').on('click', function() {
      $('.modal').removeClass('active');
    });
  }

  function showErrorMessage(message) {
    $('.modal .error-message').html(message);
    setTimeout(function() {
      $('.modal .error-message').html('');
    }, 3000);
  }

  function Login() {
    $('.signup').on('click', function() {

      if ($(this).hasClass('online')) {
        localStorageService.removeItem('user');
        $(this).html('Sign Up/Login');
        $(this).removeClass('online');
      } else {
        $('.modal').addClass('active');
      }
    });

    $('.modal-login').on('click', function() {
      var email = $('#email').val();
      var password = $('#password').val();

      if (email && password) {
        var data = {
          email: email,
          password: password.MD5()
        };

        $.ajax({
          type: 'POST',
          url: '/common/login',
          dataType: 'json',
          headers: {'Cookie' : document.cookie },
          contentType: 'application/json',
          data: JSON.stringify(data),
          success: function(data) {
            if (data.email) {
              if (data.token) {
                document.cookie = 'token=' + data.token;
              }

              localStorageService.setItem('user', data);
              $('.signup').html(data.email);
              $('.signup').addClass('online');
              $('.modal').removeClass('active');
              initApply();
            }
          },
          error: function(data) {
            showErrorMessage(data.responseJSON.message);
          }
        });
      } else {
        showErrorMessage('each filed is required');
      }
    });

    $('.modal-register').on('click', function() {
      var email = $('#email').val();
      var password = $('#password').val();
      var repassword = $('#repassword').val();

      if (email && password && password) {
        var data = {
          email: email,
          password: password.MD5(),
          repassword: repassword.MD5()
        };

        $.ajax({
          type: 'POST',
          url: '/common/register',
          dataType: 'json',
          contentType: 'application/json',
          data: JSON.stringify(data),
          success: function(data) {
            if (data.email) {
              if (data.token) {
                document.cookie = 'token=' + data.token;
              }
              localStorageService.setItem('user', data);
              $('.signup').html(data.email);
              $('.signup').addClass('online');
              $('.modal').removeClass('active');
              initApply();
            }
          },
          error: function(data) {
            showErrorMessage(data.responseJSON.message);
          }
        });
      } else if (password !== repassword) {
        showErrorMessage('password is different');
      } else {
        showErrorMessage('each filed is required');
      }
    });

    $('.to-register').on('click', function() {
      if ($('.modal').hasClass('reg')) {
        $('.modal').removeClass('reg');
        $(this).html('Register');
      } else {
        $('.modal').addClass('reg');
        $(this).html('Login');
      }
    });
  }

  function fetchNews() {
    var $article = $('.recommendation .article-recommendation');

    if ($article.length) {
      $.ajax({
        type: 'GET',
        url: '/word-press/article-recommendation',
        success: function(data) {
          if ($article.length && data.length == 3) {
            for (var i = 0; i < data.length; i++) {
              var article = data[i];
              $('.recommendation .article-list').append('<a href="' + article.url + '" class="article-item" target="_blank"><i style="background-image: url(' + article.custom_field.cover + ')"></i><label>' + article.title + '</label></a>')
            }
            if (!window.config.isMobileBrowser) {
              $article.find('label').dotdotdot({height: 70, wrap: 'letter', watch: true});
            }
          } else {
            $article.remove();
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          $article.remove();
        }
      });
    }
  }

  function initApply() {
    if (location.pathname.indexOf('site/apply') !== -1) {
      var user = localStorageService.getItem('user');

      if (user.email) {
        $('.job-apply').html('upload cv');

        if (user.resume) {
          var resumeArr = user.resume.split('/');
          var resume = resumeArr[resumeArr.length - 1];
          $('.job-apply').after('<div class="upload job-apply-resume" style="margin-left:20px">use ' + decodeURIComponent(resume) + '</div>');

          $('.job-apply-resume').on('click', function() {
            $.ajax({
              type: 'post',
              url: '/common/resume',
              dataType: 'json',
              contentType: 'application/json',
              data: JSON.stringify({
                job_id: getQueryString('id'),
                user_id: user.id + '',
                resume: user.resume,
                email: user.email,
                date: new Date().Format("yyyy-MM-dd HH:mm:ss")
              }),
              success: function(data) {
                $('.job-apply').html('success');
                alert('Thank you! We will contact you as soon as possible.');
                location.href = '/site/jobvacancy';
              },
              error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert('error');
              }
            });
          });
        }
      } else {
        $('.job-apply').html('Sign Up/Login');
      }

      $('#jobResume').fileupload({
          url: '/common/upload',
          dataType: 'json',
          // limitMultiFileUploads: 1,
          // limitMultiFileUploadSize: 2000,
          done: function (e, data) {
            $.each(data.result.files, function (index, file) {
              $.ajax({
                type: 'post',
                url: '/common/resume',
                dataType: 'json',
                contentType: 'application/json',
                data: JSON.stringify({
                  job_id: getQueryString('id'),
                  user_id: user.id + '',
                  resume: file.url,
                  email: user.email,
                  date: new Date().Format("yyyy-MM-dd HH:mm:ss")
                }),
                success: function(data) {
                  $('.job-apply').html('success');
                  alert('Thank you! We will contact you as soon as possible.');
                  location.href = '/site/jobvacancy';
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                  alert('error');
                }
              });
            });

          }
      }).prop('disabled', !$.support.fileInput)
          .parent().addClass($.support.fileInput ? undefined : 'disabled');
    }

    $('.job-apply').on('click', function() {
      var user = localStorageService.getItem('user');

      if (user.email) {
        $('#jobResume').trigger('click');
      } else {
        $('.signup').trigger('click');
      }
    });
  }

  function initMessage() {
     var $message = $('.message-submit');
     if ($message.length) {

       $message.on('click', function() {

         var name = $message.parent().find('.message-name').val();
         var email = $message.parent().find('.message-email').val();
         var phone = $message.parent().find('.message-phone').val();
         var address = $message.parent().find('.message-address').val();
         var message = $message.parent().find('.message-message').val();

         if ((name || email || phone || address) && message) {
           var data = {
             name: name,
             email: email,
             phone: phone,
             address: address,
             message: message,
             date: new Date().Format("yyyy-MM-dd HH:mm:ss")
           }

           $.ajax({
             type: 'post',
             url: '/common/message',
             dataType: 'json',
             contentType: 'application/json',
             data: JSON.stringify(data),
             success: function(data) {
               alert('Thank you! We will contact you as soon as possible.');
             },
             error: function(XMLHttpRequest, textStatus, errorThrown) {
               alert('error');
             }
           });
         } else {
           alert('Contact information and Message is required!');
         }
       });
     }
  }

  function initToApply() {
    $toApply = $('.to-apply');

    if ($toApply && $toApply.length) {
      $toApply.on('click', function() {
        location.href = '/site/apply' + location.search;
      });
    }
  }

  function initJobSearch() {
    if ($('.job-search') && $('.job-search').length) {
      $('.job-search').on('click', function() {
        var category = $(this).parent().find('.job-category').val().trim();
        var location = $(this).parent().find('.job-location').val().trim();

        setTimeout(function() {
          if (category) {
            window.open('/site/job?key=category&value=' + category, '_self');
            // location.href = '/site/job?key=category&value=' + category;
          } else if (location) {
            window.open('/site/job?key=base_location&value=' + location, '_self');
            // location.href = '/site/job?key=base_location&value=' + location;
          }
        }, 0);
      });
    }

  }

  function initJobHeader() {
    if ($('.job-wrapper') && $('.job-wrapper').length) {
      var type = {
        category: 'Category',
        base_location: 'City'
      }
      $('.job-wrapper h2').html(type[getQueryString('key')] + ': ' + (getQueryString('value') || 'all'));
      if ((getQueryString('value') || '').toLowerCase().indexOf('current') > -1) {
        $('.job-wrapper .header-tip .text').removeClass('hide');
      }
    }
  }

  function init() {
    initUser();
    Login();
    initMask();
    initApply();
    initMessage();
    initToApply();
    initJobSearch();
    initJobHeader();
  }

  init();
});
