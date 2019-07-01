const $ = jQuery;
const metaboxes = [
	'Cltvo_Vacancy_Responsabilities',
	'Cltvo_Vacancy_Habilities',
	'Cltvo_Vacancy_Experience'
]

$(document).ready(function(){

	metaboxes.forEach(function(item, index) {

		var selector = '.' + item;

		const tBody = $(selector).find('.tbody_JS').get(0);

		$(selector).on('click', '.add_JS', function() {

			var meta_name = $(this).attr('meta-name'), 
				lastkey = 0,
				nextKey = 0;

			$(tBody).find('tr').each(function(){
				var actualKey = parseInt($(this).attr('meta-key'))
				if (lastkey <= actualKey ){ lastkey = actualKey }
			});

			nextKey = lastkey + 1;

			var toClone = $(selector).find('.clone-JS').get(0);

			var clone = $(toClone).clone().appendTo(tBody).css("visibility", "visible").attr( "meta-key", nextKey).attr('id', meta_name + '_' + nextKey).removeClass('clone-JS');

			clone.find('*').attr('disabled', false);

			clone.find('td').each(function() {
				var $this = $(this);
				var inputName = $this.attr('input-name');
				$this.find('input').each(function() {
					$(this).attr('name', meta_name + '[items][' + nextKey + '][' + inputName + ']').attr('id', meta_name + '_' + nextKey + '_' + inputName);
				})
			})

		});

		//Detalles Meta - Elimnar Item
		$(selector).on('click', '.delete_JS',function(e) {

			e.preventDefault();
			var meta_name = $(this).attr('meta-name');
			var num_ele = $(tBody).children('tr').length;

			if( num_ele > 1) {
				$(this).parent().parent().remove()
			}

			var counter = 0;

			$(tBody).find('tr').each(function(){

				$(this).attr('meta-key', counter).attr('id', meta_name + '_' + counter);
				
				$(this).find('td').each(function() {
					var inputName = $(this).attr('input-name');
					$(this).find('input').each(function() {
						$(this).attr('name', meta_name + '[items][' + counter + '][' + inputName + ']').attr('id', meta_name + '_' + counter + '_' + inputName);
					})
				})

				counter++;
			});

		});

	});

	// //Detalles Meta - Sort Gallery Rows
	// function start_function() {
	// 	$('body').css('cursor', 'move');
	// 	$(selector).find('.tr_sortable').addClass('shadow');
	// }

	// function stop_function() {
	// 	$('body').css('cursor', 'default');
	// 	$(selector).find('.tr_sortable').removeClass('shadow');
	// }

	// function update_function() { }

	// $(selector).sortable({
	// 	items: '.tr_sortable',
	// 	cancel:'input,select',
	// 	start: start_function,
	// 	stop: stop_function,
	// 	update: update_function
	// });

	// $('.move').click( function (e) {
	// 	e.preventDefault();
	// });

});