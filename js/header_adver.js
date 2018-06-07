var header = [];
header[1] = {
	'title' : '暑假人气网游推荐',
	'pic' : '/CMS/uploads/20180607/20180607053154333.png',
	'link' : 'http:www.baidu.com'
};
header[2] = {
	'title' : '生活家买一送三',
	'pic' : '/CMS/uploads/20180607/20180607053136308.png',
	'link' : 'http:www.baidu.com'
};
header[3] = {
	'title' : '水润BB霜，买一赠一',
	'pic' : '/CMS/uploads/20180607/20180607053113142.png',
	'link' : 'http:www.baidu.com'
};
var i = Math.floor(Math.random()*3+1);
document.write('<a href="'+header[i].link+'" target="_blank" title="'+header[i].title+'"><img src="'+header[i].pic+'"></a>');