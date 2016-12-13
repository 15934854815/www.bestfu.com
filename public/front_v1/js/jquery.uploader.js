$.fn.uploader=function(param,ok,err){
	var _ = $(this);
	//引入Plupload 后
    var uploader = new plupload.Uploader({
	    runtimes: 'html5,html4,flash',    //上传模式,依次退化
	    browse_button: _[0],// 'struct_pickfiles',       //上传选择的点选按钮，**必需**
	    container: _.parent()[0], // 'upload-container',
	    url:param.url, // "",
		file_data_name : param.file_data_name? param.file_data_name:"download",
		send_file_name : true ,
		multi_selection : param.multi_selection? param.multi_selection:false,
		multipart_params : param.multipart_params? param.multipart_params:{},
		filters : param.filters? param.filters: { 
			max_file_size : '2mb', 
			mime_types : [ { 
				title : "图片类型", 
				extensions : "jpg,gif,png,tmp" 
			} ] 
		},
		// container: ,           //上传区域DOM ID，默认是browser_button的父元素，
		max_file_size: param.max_file_size? param.max_file_size: '2mb',           //最大文件体积限制
		flash_swf_url: '/public/front_v1/js/plupload-2.1.8/js/Moxie.swf',  //引入flash,相对路径
		max_retries: 3,                   //上传失败最大重试次数
		// dragdrop: true,                   //开启可拖曳上传
		// drop_element: document.getElementById('container'),        //拖曳上传区域元素的ID，拖曳文件或文件夹后可触发上传
		//chunk_size: '4mb',                //分块上传时，每片的体积
		auto_start: param.auto_start? param.auto_start:true,                 //选择文件后自动上传，若关闭需要自己绑定事件触发上传
		init: {
			'FilesAdded': function(up, files) {
				plupload.each(files, function(i, file) {
					up.start();
				});
				up.refresh(); 
			},
			'BeforeUpload': function(up, file) {
				// 每个文件上传前,处理相关的事情
			},
			'UploadProgress': function(up, file) {
				// 每个文件上传时,处理相关的事情
			},
			'FileUploaded': function(up, file, info) {
					if (typeof ok == 'function') ok(JSON.parse(info.response), up, file);
					up.refresh();
			},
			'Error': function(up,info){
					console.log(info);
					var msg = '';
					if (info.code==plupload.FILE_EXTENSION_ERROR || info.code==plupload.IMAGE_FORMAT_ERROR) {
						// 文件扩展名错误
						msg = '请上传图片文件';
					}else if (info.code == plupload.FILE_SIZE_ERROR) {
						msg = '上传文件过大, 最大支持上传2M';
					} else {	
						msg = '上传图片失败 ' + info.message;
					}
					if (typeof err == 'function') err(msg,up);
				up.refresh();
			}
		}
	});
	uploader.init();
};