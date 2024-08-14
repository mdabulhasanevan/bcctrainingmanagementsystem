var baseUrl="http://localhost/bcc/";
var LiveCamera=null;

var app = angular.module("myApp",['ngRoute']);

//,'ui.bootstrap'
app.filter('beginning_data', function() {
    return function(input, begin) {
        if (input) {
            begin = +begin;
            return input.slice(begin);
        }
        return [];
    }
});

app.directive('ckEditor', function () {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);

            if (!ngModel) return;

            ck.on('pasteState', function () {
                scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});

app.directive("datepicker", function() {
  return {
    restrict: "A",
    require: "ngModel",
    link: function(scope, element, attrs, ngModelCtrl) {
      $(element).datetimepicker({
        format:'Y/m/d H:i',
        defaultTime: '10:00am',
        formatDate:'Y/m/d',
        timeFormat: "HH:mm:ss",
        dateFormat: "dd/mm/yy",
        onSelect: function(date) {
          scope.$apply(function() {
            ngModelCtrl.$setViewValue(date);
          });
        }
      });
    }
  };
});



