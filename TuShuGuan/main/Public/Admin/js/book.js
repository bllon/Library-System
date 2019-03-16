
$('.table tr td').each(function(i){
	$(this).focus(function(){
		var value=$(this).html();
		var n=$(this).index();
		var index=$(this).parent('tr').index();
		$(this).blur(function(){
			if($(this).html()===value){
				
			}else{
				var newValue=$(this).html();
				var data={'index':index,'n':n,'message':newValue};
				update(index,data,n);
			}
			
		});
	});
})

function update(index,data,n){
	$.get("./update",data,function(status,success){
		if(status!=='ok'){
			alert('修改失败!');
		}
	})
}
