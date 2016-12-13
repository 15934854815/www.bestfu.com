if (!window.console) {
	window.console = {log:function(){}};
	
}

$(function(){

var _support = '<div class="row">' +
    '<div class="col-xs-4">' +
    '<p>解决方案</p>' +
    '<span>对花园洋房的各种房型、别墅、社区、酒店均有对应的标准化书面解决方案，帮助客户节省大量时间和经理；对于特殊场所的解决方案，贝多福有专业人员协助指定解决方案，帮助客户迅速对复杂市场需求。</span>' +
    '</div>' +
    '<div class="col-xs-4">' +
    '<p>产品无忧</p>' +
    '<span>贝多福采用全球最好的工业材料，对于非人为原因引起的茶农故障，贝多福提供全方位。严格的售后保障体系：七日内无理由退货，十五天换货。</span>' +
    '</div>' +
    '<div class="col-xs-4">' +
    '<p>技术支持</p>' +
    '<span>贝多福对于所以售出产品均提供包括产品安装、调试、设置、使用等全方位的免费技术支持与咨询，确保客户方便快捷的使用贝多福产品。</span>' +
    '</div>' +
    '</div>';
var support = document.getElementsByClassName('support')[0];
if (support) {
    support.innerHTML = _support;
}
var button = $('button');
if (button) {
    button.mousedown(function () {
        $(this).css('outline', 'none');
    })
}

/*************num-box begin*****************/
/*
(function () {
    //var num_box = document.getElementsByClassName('num-box')[0];
    //if (num_box) {
    //    var input = num_box.getElementsByTagName('input')[0],
    //        btn1 = num_box.getElementsByTagName('button')[0],
    //        btn2 = num_box.getElementsByTagName('button')[1];
    //    input.value = 1;
    //    btn1.onclick = function () {
    //        if (input.value < 99) {
    //            input.value++;
    //        }
    //    };
    //    btn2.onclick = function () {
    //        if (input.value > 1) {
    //            input.value--;
    //        }
    //    };
    //}
window.onload = function () {
        $('.num-box').each(function () {
            var btn1 = $(this).find('.add')[0];
            var btn2 = $(this).find('.subtract')[0];
            var input = $(this).find('input')[0];
            input.onchange = function () {
                var reg = new RegExp("^[0-9]+$");
                if (!reg.test((this.value)) * 1) {
                    alert("请输入数字");
                    this.value = 1;
					return ;
                }
            }
            // input.value = 1;
            btn1.onclick = function () {
                if (input.value < 99) {
                    ++input.value;

                }
            };
            btn2.onclick = function () {
                if (input.value > 1) {
                    --input.value;

                }
            };
        });
    }
}());

*/
/*************num-box over*****************/
//(function () {
//    var s = document.createElement("script");
//    s.onload = function () {
//        bootlint.showLintReportForCurrentDocument([]);
//    };
//    s.src = "../js/bootlint.js";
//    document.body.appendChild(s)
//})();
/*****************verifcode************************/
$('.code').click(function () {
    var _ = this,
		target = $(this).attr('code-target'),
		label = $('body').find(':input[code-label="'+target+'"]'),
		w = 59;
	if ($.trim(label.val()).length > 0 && ( /^[a-zA-Z0-9_-]+@\S+$/.test(label.val()) || /^1\d{10}$/.test(label.val()) )) {
	    (function time(code) {
			if (w === 0) {
				code.removeAttribute("disabled");
				code.innerHTML = "获取验证码";
				w = 59;
			} else {
				code.setAttribute("disabled", true);
				code.innerHTML = w + "秒后重新获取";
				w--;
				setTimeout(function () {
					time(code);
				}, 1000)
			}
		})(_);
	} else {
		alert(label.attr('empty-msg'));
		return;
		
	}
})

$(":input[type=checkbox]").each(function () {
    if ($(this)[0].checked) {
        $(this).parent().addClass("active");
    } else {
		 $(this).parent().removeClass("active");
		
	}
    $(this).change(function () {
        if ($(this)[0].checked) {
            $(this).parent().addClass("active");
        } else {
            $(this).parent().removeClass("active");
        }
    })
});


$("label.radio-inline>:input[type=radio]").each(function () {
	if ($(this)[0].checked) {
		$(this).parent().addClass("active");
	}
	$(this).change(function () {
		if ($(this)[0].checked) {
			$(this).parent().addClass("active");
			$(this).parent().siblings().removeClass("active");
		} else {
			$(this).parent().removeClass("active");
		}
	});
})

/*placeholder.js*/
;
(function (f, h, $) {
    var a = 'placeholder' in h.createElement('input'), d = 'placeholder' in h.createElement('textarea'), i = $.fn, c = $.valHooks, k, j;
    if (a && d) {
        j = i.placeholder = function () {
            return this
        };
        j.input = j.textarea = true
    } else {
        j = i.placeholder = function () {
            var l = this;
            l.filter((a ? 'textarea' : ':input') + '[placeholder]').not('.placeholder').bind({
                'focus.placeholder': b,
                'blur.placeholder': e
            }).data('placeholder-enabled', true).trigger('blur.placeholder');
            return l
        };
        j.input = a;
        j.textarea = d;
        k = {
            get: function (m) {
                var l = $(m);
                return l.data('placeholder-enabled') && l.hasClass('placeholder') ? '' : m.value
            }, set: function (m, n) {
                var l = $(m);
                if (!l.data('placeholder-enabled')) {
                    return m.value = n
                }
                if (n == '') {
                    m.value = n;
                    if (m != h.activeElement) {
                        e.call(m)
                    }
                } else {
                    if (l.hasClass('placeholder')) {
                        b.call(m, true, n) || (m.value = n)
                    } else {
                        m.value = n
                    }
                }
                return l
            }
        };
        a || (c.input = k);
        d || (c.textarea = k);
        $(function () {
            $(h).delegate('form', 'submit.placeholder', function () {
                var l = $('.placeholder', this).each(b);
                setTimeout(function () {
                    l.each(e)
                }, 10)
            })
        });
        $(f).bind('beforeunload.placeholder', function () {
            $('.placeholder').each(function () {
                this.value = ''
            })
        })
    }
    function g(m) {
        var l = {}, n = /^jQuery\d+$/;
        $.each(m.attributes, function (p, o) {
            if (o.specified && !n.test(o.name)) {
                l[o.name] = o.value
            }
        });
        return l
    }

    function b(m, n) {
        var l = this, o = $(l);
        if (l.value == o.attr('placeholder') && o.hasClass('placeholder')) {
            if (o.data('placeholder-password')) {
                o = o.hide().next().css("display","inline-block").css("color","#a3a0a0").attr('id', o.removeAttr('id').data('placeholder-id'));
                $(".form-control").css("color","#999");
                if (m === true) {
                    return o[0].value = n
                }
                o.focus()
            } else {
                l.value = '';
                o.removeClass('placeholder');
                l == h.activeElement && l.select()
            }
        }
    }

    function e() {
        var q, l = this, p = $(l), m = p, o = this.id;
        if (l.value == '') {
            if (l.type == 'password') {
                if (!p.data('placeholder-textinput')) {
                    try {
                        q = p.clone().attr({type: 'text'})
                    } catch (n) {
                        q = $('<input>').attr($.extend(g(this), {type: 'text'}))
                    }
                    q.removeAttr('name').data({
                        'placeholder-password': true,
                        'placeholder-id': o
                    }).bind('focus.placeholder', b);
                    p.data({'placeholder-textinput': q, 'placeholder-id': o}).before(q)
                }
                p = p.removeAttr('id').hide().prev().attr('id', o).show()
            }
            p.addClass('placeholder').css("color","#a3a0a0");
            p[0].value = p.attr('placeholder')
        } else {
            p.removeClass('placeholder')
        }
    }
}(this, document, jQuery));
$(function(){ $('input, textarea').placeholder(); });
});

// 地址表单检测
function checkAddressFrm(obj)
{
	var _ = $(obj),
		query = _.serializeArray();
	for (var x in query) {
		query[x].value = $.trim(query[x].value);
		var v = query[x];
		switch(v.name) {
			case 'province':
			case 'city':
				if (!v.value) {
					alert('省市必填!');
					_.find(':input[name="'+v.name+'"]').focus();
					return false;
				}
				break;
			case 'consignee':
				if (v.value.length == 0 || v.value.length > 30) {
					alert('联系人不能为空且长度在30字内');
					_.find(':input[name="'+v.name+'"]').focus();
					return false;
				}
					
				break;
			case 'address':
				if (v.value.length == 0 || v.value.length > 120) {
					_.find(':input[name="'+v.name+'"]').focus();
					alert('详细地址不能为空且长度在120字内');
					return false;
				}
					
				break;
			case 'mobile':
				if (!/^1\d{10}$/.test(v.value)) {
					_.find(':input[name="'+v.name+'"]').focus();
					alert('手机号格式错误');
					return false;
				}
				break;
			case 'tel_areacode':
				if (v.value.length > 0 && !/^0\d+$/.test(v.value)) {
					_.find(':input[name="'+v.name+'"]').focus();
					alert('固定号码区号格式错误');
					return false;
				}
				break;
			case 'tel_master':
				if (v.value.length > 0 && !/^\d+$/.test(v.value)) {
					_.find(':input[name="'+v.name+'"]').focus();
					alert('固定号码主叫号格式错误');
					return false;
				}
				break;
			case 'tel_extension':
				if (v.value.length > 0 && !/^\d+$/.test(v.value)) {
					_.find(':input[name="'+v.name+'"]').focus();
					alert('固定号码分机号格式错误');
					return false;
				}
				break;
			default:
				break;
		}
	}
	return true;
}

// 生成从当前年份开始向前或向后N年的日历
$.fn.rslDateSelector = function(n,selected){
	var  _ = $(this),
		_f1= _.find('select:eq(0)'),
		_f2= _.find('select:eq(1)'),
		_f3= _.find('select:eq(2)');
		
	var Now = new Date(),
		now_year = Now.getFullYear(),
		years 	= [], // 年份数组
		months 	= [1,2,3,4,5,6,7,8,9,10,11,12],  // 月份数组
		days 	= [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];	// 日期数组
	
	var n = parseInt(n),
		selected = selected ? selected.split('-') : [];
	if (n == 0)
		n = 1;
	for (var i = 0; i < Math.abs(n); ++i) {
		var y = i * (n <=0 ? -1 : 1) + now_year;
		_f1[0].options[i] = new Option(y, y);
	}
	
	for (var x in months) {
		_f2[0].options[x] = new Option(months[x], months[x]);
	}
	for (var x in days) {
		_f3[0].options[x] = new Option(days[x], days[x]);
	}

	_.find('select:lt(2)').change(function(){
		var y = parseInt(_f1.val()),
			m = parseInt(_f2.val()),
			s = days;
		switch (m) {
			case 4:
			case 6:
			case 9:
			case 11:
				s = s.slice(0,30);
				break;
			case 2:
				if ( y%4==0 && (y%100!=0 || y%400==0) ) {
					s = s.slice(0,29); // 闰年29天
				} else {
					s = s.slice(0,28); // 平年28天
				}
				break;
			default:
				break;
		}
		_f3.empty();
		for (var x in s) {
			_f3[0].options[x] = new Option(s[x], s[x]);
		}
		
	});
	_f1.val(parseInt(selected[0]));
	_f2.val(parseInt(selected[1]));
	_f1.trigger('change');
	_f3.val(parseInt(selected[2]));
};
