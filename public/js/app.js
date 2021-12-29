/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
Author : Dreamguys
Template Name: Preschool  - Bootstrap Admin Template
Version : 1.0
*/
$(document).ready(function ($) {
  // Variables declarations
  var $wrapper = $('.main-wrapper');
  var $pageWrapper = $('.page-wrapper');
  var $slimScrolls = $('.slimscroll');
  var $sidebarOverlay = $('.sidebar-overlay'); // Sidebar

  var Sidemenu = function Sidemenu() {
    this.$menuItem = $('#sidebar-menu a');
  };

  function init() {
    var $this = Sidemenu;
    $('#sidebar-menu a').on('click', function (e) {
      if ($(this).parent().hasClass('submenu')) {
        e.preventDefault();
      }

      if (!$(this).hasClass('subdrop')) {
        $('ul', $(this).parents('ul:first')).slideUp(350);
        $('a', $(this).parents('ul:first')).removeClass('subdrop');
        $(this).next('ul').slideDown(350);
        $(this).addClass('subdrop');
      } else if ($(this).hasClass('subdrop')) {
        $(this).removeClass('subdrop');
        $(this).next('ul').slideUp(350);
      }
    });
    $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
  } // Sidebar Initiate


  init(); // Sidebar overlay

  function sidebar_overlay($target) {
    if ($target.length) {
      $target.toggleClass('opened');
      $sidebarOverlay.toggleClass('opened');
      $('html').toggleClass('menu-opened');
      $sidebarOverlay.attr('data-reff', '#' + $target[0].id);
    }
  } // Mobile menu sidebar overlay


  $(document).on('click', '#mobile_btn', function () {
    var $target = $($(this).attr('href'));
    sidebar_overlay($target);
    $wrapper.toggleClass('slide-nav');
    $('#chat_sidebar').removeClass('opened');
    return false;
  }); // Chat sidebar overlay

  $(document).on('click', '#task_chat', function () {
    var $target = $($(this).attr('href'));
    console.log($target);
    sidebar_overlay($target);
    return false;
  }); // Sidebar overlay reset

  $sidebarOverlay.on('click', function () {
    var $target = $($(this).attr('data-reff'));

    if ($target.length) {
      $target.removeClass('opened');
      $('html').removeClass('menu-opened');
      $(this).removeClass('opened');
      $wrapper.removeClass('slide-nav');
    }

    return false;
  }); // Select 2

  if ($('.select').length > 0) {
    $('.select').select2({
      minimumResultsForSearch: -1,
      width: '100%'
    });
  } // Floating Label


  if ($('.floating').length > 0) {
    $('.floating').on('focus blur', function (e) {
      $(this).parents('.form-focus').toggleClass('focused', e.type === 'focus' || this.value.length > 0);
    }).trigger('blur');
  } // Right Sidebar Scroll


  if ($('.msg-list-scroll').length > 0) {
    $('.msg-list-scroll').slimscroll({
      height: '100%',
      color: '#878787',
      disableFadeOut: true,
      borderRadius: 0,
      size: '4px',
      alwaysVisible: false,
      touchScrollStep: 100
    });
    var msgHeight = $(window).height() - 124;
    $('.msg-list-scroll').height(msgHeight);
    $('.msg-sidebar .slimScrollDiv').height(msgHeight);
    $(window).resize(function () {
      var msgrHeight = $(window).height() - 124;
      $('.msg-list-scroll').height(msgrHeight);
      $('.msg-sidebar .slimScrollDiv').height(msgrHeight);
    });
  } // Left Sidebar Scroll


  if ($slimScrolls.length > 0) {
    $slimScrolls.slimScroll({
      height: 'auto',
      width: '100%',
      position: 'right',
      size: '7px',
      color: '#ccc',
      wheelStep: 10,
      touchScrollStep: 100
    });
    var wHeight = $(window).height() - 60;
    $slimScrolls.height(wHeight);
    $('.sidebar .slimScrollDiv').height(wHeight);
    $(window).resize(function () {
      var rHeight = $(window).height() - 60;
      $slimScrolls.height(rHeight);
      $('.sidebar .slimScrollDiv').height(rHeight);
    });
  } // Page wrapper height


  var pHeight = $(window).height();
  $pageWrapper.css('min-height', pHeight);
  $(window).resize(function () {
    var prHeight = $(window).height();
    $pageWrapper.css('min-height', prHeight);
  }); // Datetimepicker

  if ($('.datetimepicker').length > 0) {
    $('.datetimepicker').datetimepicker({
      format: 'DD/MM/YYYY'
    });
  } // Datatable


  if ($('.datatable').length > 0) {
    $('.datatable').DataTable({
      "bFilter": false
    });
  } // Bootstrap Tooltip


  if ($('[data-toggle="tooltip"]').length > 0) {
    $('[data-toggle="tooltip"]').tooltip();
  } // Mobile Menu


  $(document).on('click', '#open_msg_box', function () {
    $wrapper.toggleClass('open-msg-box');
    return false;
  }); // Lightgallery

  if ($('#lightgallery').length > 0) {
    $('#lightgallery').lightGallery({
      thumbnail: true,
      selector: 'a'
    });
  } // Incoming call popup


  if ($('#incoming_call').length > 0) {
    $('#incoming_call').modal('show');
  } // Summernote


  if ($('.summernote').length > 0) {
    $('.summernote').summernote({
      height: 200,
      minHeight: null,
      maxHeight: null,
      focus: false
    });
  } // Check all email


  if ($('.checkbox-all').length > 0) {
    $('.checkbox-all').click(function () {
      $('.checkmail').click();
    });
  }

  if ($('.checkmail').length > 0) {
    $('.checkmail').each(function () {
      $(this).click(function () {
        if ($(this).closest('tr').hasClass("checked")) {
          $(this).closest('tr').removeClass('checked');
        } else {
          $(this).closest('tr').addClass('checked');
        }
      });
    });
  } // Mail important


  if ($('.mail-important').length > 0) {
    $(".mail-important").click(function () {
      $(this).find('i.fa').toggleClass("fa-star");
      $(this).find('i.fa').toggleClass("fa-star-o");
    });
  }

  if ($('.dropdown-toggle').length > 0) {
    $('.dropdown-toggle').click(function () {
      if ($('.main-wrapper').hasClass('open-msg-box')) {
        $('.main-wrapper').removeClass('open-msg-box');
      }
    });
  } // Dropfiles


  if ($('#drop-zone').length > 0) {
    var dropZone = document.getElementById('drop-zone');
    var uploadForm = document.getElementById('js-upload-form');

    var startUpload = function startUpload(files) {
      console.log(files);
    };

    uploadForm.addEventListener('submit', function (e) {
      var uploadFiles = document.getElementById('js-upload-files').files;
      e.preventDefault();
      startUpload(uploadFiles);
    });

    dropZone.ondrop = function (e) {
      e.preventDefault();
      this.className = 'upload-drop-zone';
      startUpload(e.dataTransfer.files);
    };

    dropZone.ondragover = function () {
      this.className = 'upload-drop-zone drop';
      return false;
    };

    dropZone.ondragleave = function () {
      this.className = 'upload-drop-zone';
      return false;
    };
  }
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\Desktop\abet_php\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! D:\Desktop\abet_php\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });