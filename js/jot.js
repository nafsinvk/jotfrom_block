!function($, Drupal){
    function tglJI()
    {
        $('.jotFeedbackWholeWrap').toggleClass('open');
    }
$(document).ready(function(){
    //console.log(Drupal.settings.JF_JOTAutoPop);
    if(Drupal.settings.JF_JOTAutoPop)
    {
        setTimeout(function(){
            if(!$('button.jotFeedback').hasClass('clicked'))
            {
                $('button.jotFeedback').trigger('click');
            }
	}, 9000);
	clearTimeout();
    }
        $('button.jotFeedback').on('click', function(){tglJI(); 
        if(!$(this).hasClass('clicked'))
        {
        $(this).addClass('clicked');
        }
        });
        $('button.form-next-button').on('click', function(){$('.jotFormWidgetWrap').toggleClass('hide');});
        $('.jotFeedbackWholeWrap a.close').on('click', function(){tglJI();});
$("form.jotform-form").validator().on("submit", function (e) {
    if (e.isDefaultPrevented()) {
        console.log("form is not valid");
    } else {
        e.preventDefault(); console.log("Form is valid");
        var form = $(this).ajaxSubmit({target: ".jotFormWidgetWrap"});
        var xhr = form.data('jqxhr');
        xhr.done(function() {
        $('.jotFormWidgetWrap').addClass('done');
        });
    }
     return false;
});

$('.jotFeedback').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function () {
	console.log($('.jotFeedback').width())
    if(($('.jotFeedback').width()>50))
	{
	$('button#phone').css({"right":215});
	}
	else
	{
	$('button#phone').css({"right":(70)});
	}
	});

});}(jQuery, Drupal);