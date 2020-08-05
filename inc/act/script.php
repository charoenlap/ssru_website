<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/OwlCarousel2-2.3.4/dist/owl.carousel.min.js"></script>
<script src="assets/js/moment.js"></script>
<script src="assets/js/jquery.prettyembed.min.js"></script>
<script src="assets/js/fullcalendar.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/isotope.pkgd.js"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<script>
	$(document).ready(function() {

		  $('#calendar').fullCalendar({
		    // editable: true,
		    eventLimit: true, // allow "more" link when too many events
		    eventColor: '#<?php echo $color; ?>',
		    // events: [
		    //   {
		    //     title: 'All Day Event',
		    //     start: '2018-03-01'
		    //   },
		    //   {
		    //     title: 'Long Event',
		    //     start: '2018-03-07',
		    //     end: '2018-03-10'
		    //   },
		    // ],
		    events: {
		      url: 'ajax/event_calendar.php',
		      type: 'GET',
		      data: {
		        cat: '<?php echo $cat_calendar; ?>',
		      },
		      success:function(data){
		        console.log(data)
		        // alert('ss')
		      },
		      error: function(data) {
		        console.log("Unable to load events");
		      }
		    },
		    dayClick: function(date, jsEvent, view) {
		      d = date['_d'];
		      var weekday = new Array(7);
		      weekday[0] =  "Sunday";
		      weekday[1] = "Monday";
		      weekday[2] = "Tuesday";
		      weekday[3] = "Wednesday";
		      weekday[4] = "Thursday";
		      weekday[5] = "Friday";
		      weekday[6] = "Saturday";
		      var day = weekday[d.getDay()];
		      console.log(day);
		      month = d.toLocaleString("en-us", { month: "short" });
		      console.log(month);		      
		      // alert(month)

		      day = date.format()
		      // var get_cat = '<?php echo get('cat'); ?>'
		      // window.location.href = 'cp-content-add-edit.php?calendar_day='+day+'&cat='+get_cat;
		  }
		  });
		});
		$(document).on('click', '.fc-end,.fc-not-end', function(event) {
			event.preventDefault();
			var href = $(this).attr('href');
		  	$.ajax({
			    url:"ajax/content_modal.php",
			    type: "get",
			    // dataType: "json",
			    data: {
			        ref_id: href,
			    },
			    success:function(data){
			    	console.log(data)
			    	$('#calendar_modal').modal('show');
			    	$('#calendar_title').html(data.title);
			    	$('#calendar_detail').html(data.detail);
			    	if (data.picture2 != null) {
			    		var str = '<p>ดาวน์โหลด ไฟล์ PDF <a href="http://www.website-thai.com/project/ssru/theme/upload/content/'+data.picture2+'" download=""> คลิ๊ก</a></p>'
				    	$('#file_pdf').html(str);
			    	}
			    	// alert('ss')
			    },
			    error:function(data, textStatus, jqXHR){
			      console.log(jqXHR.responseText);
			    }
			});
		});
</script>

<script>
	// header top
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	    if (scroll >= 125) {
	        $("#navbar").addClass("sticky");
	    } else {
	        $("#navbar").removeClass("sticky");
	    }
	});


	// fixed height page
	$(document).ready(function() {
		var w = $(window).height();
		$('.bg-portfolio').css('min-height',w-457+'px');
		$('.fh-page').css('min-height',w-457+'px');
	});
</script>


<script>
	var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
    });
    wow.init();
</script>
