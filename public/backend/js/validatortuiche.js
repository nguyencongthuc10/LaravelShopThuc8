// dối tượng validator


function Validator(options) {
    var selectorRule = {};

    function Validate(inputElement, rule) {
        var errorElement = inputElement.parentElement.querySelector(options.errorMessage);
        var errorMessage;
        var rules = selectorRule[rule.selector];


        for (var i = 0; i < rules.length; ++i) {
            errorMessage = rules[i](inputElement.value);
            if (errorMessage) break;
        }
        if (errorMessage) {
            errorElement.innerHTML = errorMessage;
            inputElement.parentElement.classList.add('invalid');
        } else {
            errorElement.innerHTML = '';
            inputElement.parentElement.classList.remove('invalid');
        }
        return !errorMessage;
    }

    var formElement = document.querySelector(options.form);
    if (formElement) {
        formElement.onsubmit = function(e) {
            e.preventDefault();
            var isFromValid = true;
            options.rules.forEach(function(rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var isValid = Validate(inputElement, rule);
                if (!isValid) {
                    isFromValid = false;
                }
            });
            if (isFromValid) {
                if (typeof options.onSubmit === 'function') {
                    var enableInputs = formElement.querySelectorAll('[name]:not[disabled]')
                    var formValues = Array.from(enableInputs).reduce(function(values, input) {
                        return (values[input.name] = input.value) && values;
                    }, {});
                } else {
                    formElement.submit();
                }

            }
        }


        options.rules.forEach(function(rule) {

            if (Array.isArray(selectorRule[rule.selector])) {
                selectorRule[rule.selector].push(rule.test);
            } else {
                selectorRule[rule.selector] = [rule.test];
            }
            var inputElement = formElement.querySelector(rule.selector);
            var errorElement = inputElement.parentElement.querySelector(options.errorMessage);
            if (inputElement) {
                // xử lý khì người dùng blur ra khỏi input
                inputElement.onblur = function() {
                    Validate(inputElement, rule);
                }
                inputElement.oninput = function() {
                    errorElement.innerHTML = '';
                    inputElement.parentElement.classList.remove('invalid');
                }

            }
        });
    }
}
// định nhgia4 rules
// nguyên tắc rules
// nếu có lỗi -> trả về message lỗi.
// kih hợp lệ =/ không trả vè gì
Validator.isRequired = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này'
        }
    }
}

Validator.isEmail = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập email'
        }
    }
}

Validator.isMinlength = function(selector, min, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.length >= min ? undefined : message || `Giá trị tối thiểu ${min} ký tự`
        }
    }
}

Validator.isMaxlength = function(selector, max, message) {
    return {
        selector: selector,
        test: function(value) {
            return value.length <= max ? undefined : message || `Giá trị tối đa ${max} ký tự`
        }
    }
}

Validator.isConfirmed = function(selector, getPassword, message) {
    return {
        selector: selector,
        test: function(value) {
            return value === getPassword() ? undefined : message || 'Giá trị không trùng'
        }
    }
}

Validator.isNameField = function(selector, message) {
    return {
        selector: selector,
        test: function(value) {
            regex = /^[a-zA-Z ]{2,30}$/;
            return regex.test(value) ? undefined : message || 'Tên không hợp lệ'
        }
    }
}