var setEditor = function(element, args)
{
	info = {
		'setId' : 1
	};

	cards = new Array();

	if (args) {
		$.extend(info, args);
	}

	var cardEditor = function(element, args)
	{
		var card = element;
		var status = {
			'touched' : true,
			'id' : 0
		};
		if (args) {
			$.extend(status, args);
		}
		//alert(status['id']);
		if (card.hasClass('bottom')) {
			status['touched'] = false;
		}
		card.children('input').bind('focusin', function() {
			if (!status['touched']) {
				if (card.prev().children('input').val() != '' || status['id'] == 0) {
					cards[cards.length + 1] = new cardEditor (card.clone().insertAfter(card), {'id' : status['id']+1});
					status['touched'] = true;
					card.removeClass('bottom');
					card.children('input').val('');
				} else {
					card.prev().children('.term').focus();
				}
			}
		});
		card.children('input').bind('focusout', function() {
			
			term = escape ( element.children('.term').val() );
			def = escape ( element.children('.def').val() );
			$("#rec").html('setId=' + info['setId'] + '&cardId=' + status['id'] + '&term=' + term + '&def=' + def);
			$.ajax({
				type : 'GET',
				url : '../updatecard',
				data : 'setId=' + info['setId'] + '&cardId=' + status['id'] + '&term=' + term + '&def=' + def,
				dataType : 'html',
				success: function(msg){
					$("#rec").html(msg);
				}
			});
		});
	
	};
	i = 0;
	$.each(element.children('.card'), function() {
		cards[cards.length + 1] = new cardEditor($(this), {'id' : i});
		i+=1;
	});
	$('#title').bind('focusout', function() {
		$.ajax({
			type : 'GET',
			url : '../updateset',
			data : 'setId=' + info['setId'] + '&title=' + escape($(this).val()),
			dataType : 'html',
			success: function(msg){
				$("#rec").html(msg);
			}
		});
	});
};
