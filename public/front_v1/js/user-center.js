/**
 * Created by Administrator on 2016/5/25.
 */
var _header = '<nav class="navbar  navbar-static-top ">' +
    '<div class="container">' +
    '<div class="navbar-header">' +
    '<a class="navbar-brand" href="index.html"></a>' +
    '</div>' +
    '<div id="navbar" class="navbar-collapse collapse">' +
    '<ul class="nav pull-right navbar-nav">' +
    '<li class="shop-cart active"><a href="shop-cart"></a></li>' +
    '<li class="dropdown login active">' +
    '<a href="#" id="login" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="login-down"></span></a>' +
    '<ul class="dropdown-menu dropdown-menu-left">' +
    '<li><a href="login.html">用户中心</a></li>' +
    '<li role="separator" class="divider"></li>' +
    '<li><a href="login.html">VIP用户</a></li>' +
    '<li role="separator" class="divider"></li>' +
    '<li><a href="login.html">VIP企业用户</a></li>' +
    '<li role="separator" class="divider"></li>' +
    '<li><a href="login.html">A类运营商</a></li>' +
    '<li role="separator" class="divider"></li>' +
    '<li><a href="login.html">B类运营商</a></li>' +
    '</ul>' +
    '</li>' +
    '</ul>' +
    '<div class="nav navbar-nav pull-left">' +
    '<p>'+'123'+'</p>' +
    '</div>' +
    '</div>' +
    '</div>' +
    '</nav>';
var header = document.getElementsByTagName('header')[0];
header.innerHTML = _header;
