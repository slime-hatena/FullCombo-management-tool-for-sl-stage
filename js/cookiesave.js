/*
	== CookieSave ==
	Author : 猫と重金属 http://massacre.s59.xrea.com/
	License: MIT-License
*/

var CookieSave = {
	'forms'    : undefined,
	'elements' : undefined,
	'expires'  : 30*24*60*60*1000,
	'domain'   : undefined,
	'path'     : undefined,
	'secure'   : undefined,
	
	'exist' : function(arr, value){
		for(var i=0; i<arr.length; i++){
			if (arr[i] == value) return true;
		}
		return false;
	},
	
	'initialize': function(){
		// 各フォームにイベント追加
		var forms = document.getElementsByTagName('form');
		for(var i=0; i<forms.length; i++){
			if (CookieSave.forms){
				if (! CookieSave.exist(CookieSave.forms, forms[i].id || i)) continue;
			}
			var func = (function(form){
				return function(){ CookieSave.save(form);}
			})(forms[i]);
			if (forms[i].addEventListener) forms[i].addEventListener('submit', func, false);
			else if(forms[i].attachEvent)  forms[i].attachEvent('onsubmit', func);
		}
		
		CookieSave.load();
	},
	
	// cookie を読み込み、フォームに適用
	'load': function(){
		var forms = document.cookie.split(/\s*;\s*/);
		for(var i=0; i<forms.length; i++){
			// 対象フォームの取得
			var tmp = forms[i].match(/^(.+?)=(.*)$/);
			if (!tmp || tmp.length != 3) continue;
			var form = tmp[1].match(/\D/) ?
				document.getElementById(tmp[1]) :
				document.getElementsByTagName('form')[tmp[1]];
			if (!form || form.tagName.toLowerCase() != 'form') continue;
			// 各要素毎に分解
			var elements = tmp[2].split('%00');
			var cookies = {};
			for(var j=0; j<elements.length; j++){
				var tmp = decodeURIComponent(elements[j]).match(/^([^=]+)=(.*)$/);
				if (!tmp || tmp.length != 3) continue;
				var key   = tmp[1];
				var value = tmp[2];
				if (typeof cookies[key] == 'undefined') cookies[key] = [];
				cookies[key].push(value);
			}
			
			// フォームへの適用
			for(var j=0; j<form.elements.length; j++){
				var elm = form.elements[j];
				var values = cookies[elm.name];
				if (typeof values == 'undefined') continue;
				
				switch(elm.tagName.toLowerCase()){
				case 'input':
					switch(elm.type.toLowerCase()){
						case 'text':
						case 'password':
							elm.value = values[0];
							break;
						case 'radio':
						case 'checkbox':
							elm.checked = CookieSave.exist(values, elm.value);
							break;
					}
					break;
				case 'select':
					for(var k=0; k<elm.options.length; k++){
						elm.options[k].selected = CookieSave.exist(values, elm.options[k].value);
					}
					break;
				case 'textarea':
					elm.value = values[0];
					break;
				}
			}
		}
	},
	
	'save': function(form){
		// 保存名の取得
		var name = form.id;
		if (! name){
			var forms = document.getElementsByTagName('form');
			for(var i=0; i<forms.length; i++){
				if (form == forms[i]){
					name = i;
					break;
				}
			}
		}
		// 各要素の値の取得
		var cookies = [];
		for(var i=0; i<form.elements.length; i++){
			var elm = form.elements[i];
			if (! elm.name) continue;
			if (CookieSave.elements){
				if (! CookieSave.exist(CookieSave.elements, elm.name)) continue;
			}
			
			switch(elm.tagName.toLowerCase()){
			case 'input':
				switch(elm.type.toLowerCase()){
					case 'text':
					case 'password':
						cookies.push(elm.name + "=" + elm.value);
						break;
					case 'radio':
					case 'checkbox':
						if (elm.checked) cookies.push(elm.name + "=" + elm.value);
				}
				break;
			case 'select':
				for(var j=0; j<elm.options.length; j++){
					if (elm.options[j].selected) cookies.push(elm.name + "=" + elm.options[j].value);
				}
				break;
			case 'textarea':
				if (! CookieSave.elements) break;
				cookies.push(elm.name + "=" + elm.value);
				break;
			}
		}
		// cookie の作成
		for(var i=0; i<cookies.length; i++){
			cookies[i] = encodeURIComponent(cookies[i]);
		}
		var cookie = name + "=" + cookies.join('%00');
		if (CookieSave.expires){
			var date = new Date();
			date.setTime(date.getTime() + CookieSave.expires);
			cookie += "; expires=" + date.toGMTString();
		}
		if (CookieSave.domain) cookie += "; domain=" + CookieSave.domain;
		if (CookieSave.path)   cookie += "; path=" + CookieSave.path;
		if (CookieSave.secure) cookie += "; secure";
		
		document.cookie = cookie;
	}
};

(function(){
	if (window.addEventListener){
		window.addEventListener('load', CookieSave.initialize, false);
	} else if(window.attachEvent){
		window.attachEvent('onload', CookieSave.initialize);
	}
})();
