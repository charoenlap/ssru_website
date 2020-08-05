$(function(){

	function get_date() {
		var d = new Date();
		// var time = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+'_'+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
		var date = d.getDate()+'-'+(d.getMonth()+1)+'-'+d.getFullYear();
		return date;
	}

	$('.tabs li a').click(function(e){
		var tab_traget = $(this).attr('data-tab');
		$('.tab_content').css('display','none');
		$('#'+tab_traget).css('display','block');
		$('.tabs a.btn').removeClass('btn-primary');
		$(this).addClass('btn-primary');
		e.preventDefault();
	});
	var options = {
	  valueNames: [ 'topic', 'msg', 'reply', 'update' ],
	  page: 15,
	  plugins: [
	      ListPagination({})
	    ]
	};
	var userList = new List('table-approve', options);

	var options_ans = {
	  valueNames: [ 'date', 'status','msg' ],
	  page: 5,
	  plugins: [
	      ListPagination({})
	    ]
	};

	var userList = new List('table-answer', options_ans);

	$('.btn-edit-msg').click(function(e){
		$('#msg-edit').val($(this).attr('data-message'));
		$('#btn-edit-ans-save').attr('data-question-detail-id',$(this).attr('data-id'));
		$('#btn-edit-ans-save').attr('data-user-id',$(this).attr('data-user-id'));
	});
	$('#myModal').on('show.bs.modal', function (event) {
	  //alert();
	  //$('#msg-edit').val($(this).attr('data-message'));
	});
});
$(function(){
	// $('#table-admin-cal .no').change(function(e){
	$('#table-admin-cal .no').change(function(e){
		var price = $(this).attr('price');
		var total = 0;
		$(this).parent('td').parent('tr').find('.total').text( $(this).val()*price );
		$( "#table-admin-cal .total" ).each(function( index ) {
		  total += parseInt($(this).text());
		});
		$('#textTotal_1').text(total);
		$('#textTotal_2').val(total);
	});
	
});



$(function(){
    $("#addRow").click(function(){
        $("#tbodyMain").append('<tr>'+$("#firstTr").html()+'</tr>');
        // $("#table-admin-cal tr:last").append($("#firstTr").clone());
        
    });
    $("#removeRow").click(function(){
        if($("#tbodyMain").size()>1){
            $("#tbodyMain tr:last").remove();
        }else{
            alert("ต้องมีรายการข้อมูลอย่างน้อย 1 รายการ");
        }
    });         
});


