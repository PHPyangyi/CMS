var sidebar = [];
sidebar[1] = {
	'title' : 'test011',
	'pic' : '/CMS/uploads/20180607/20180607053255442.jpg',
	'link' : 'http:www.baidu.com'
};
sidebar[2] = {
	'title' : 'test',
	'pic' : '/CMS/uploads/20180607/20180607053237235.jpg',
	'link' : 'http:www.baidu.com'
};
sidebar[3] = {
	'title' : '爱制造旗舰店',
	'pic' : '/CMS/uploads/20180607/20180607053217221.jpg',
	'link' : 'http:www.baidu.com'
};
var i = Math.floor(Math.random()*3+1);
document.write('<a href="'+sidebar[i].link+'" target="_blank" title="'+sidebar[i].title+'"><img border="0" src="'+sidebar[i].pic+'"></a>');