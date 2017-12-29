$(document).ready(function(){
	auflisten();
	$('.meldung').on('click', function() {
        $(this).fadeOut(300);
    });
});

function speichern(){
	//console.clear();
	console.warn('Funktionsaufruf Speichern gestartet...');
	var check = false;
	var id = $('#id').val();
	var beschreib = $('#beschreib').val();
	var what = $('#what').val();
	var website = $('#website').val();

	//Überprüfen ob alle Felder ausgefüllt sind
	if (beschreib && what && website){
		check = true;
	} else {
		console.warn(beschreib, what, website);
		console.warn('Hinweis, Bitte füllen Sie alle Felder aus.', 'danger');
	}

	if(check){
		$.ajax({
			type: "POST",
			url: "app/View.php",
			data: { aktion: 'erstellen', id: id, beschreib: beschreib, what: what, website: website },
			dataType: "JSON",
			beforeSend: function() {
				console.log('Daten werden abgerufen... beforeSend!');
			},
			success: function() {
				console.log('Daten wurden empfangen!');
				auflisten();
			},
			error: function(error) {
				console.log(error);
			},
			complete: function() {
				console.warn('Funktionsaufruf beendet')
			},
		});
	}
}

function auflisten() {
	//console.clear();
	console.warn('Einträge werden aufgelistet...');
	var check = true;

	if(check) {
		$.ajax({
			type: "POST",
			url: "app/View.php",
			data: { aktion: 'auflisten' },
			dataType: "JSON",
			beforeSend: function() {
				console.log('Daten werden abgerufen... beforeSend');

				$('.inputs input, .inputs select')
                $('#id');
                $('#tutorial_beschreib');
                $('#tutorial_what');
                $('#tutorial_url');
			},
			success: function(daten) {
				console.log('daten wurden empfangen')
				console.log(daten);
				var html = '';
				if (daten.length > 0) {
					$.each(daten, function(key, value) {
						html+= '<tr>\
                                <td class="capitalize">' + value.id + '</td>\
                                <td class="capitalize">' + value.tutorial_beschreib + '</td>\
                                <td class="capitalize">' + value.tutorial_what + '</td>\
                                <td class="capitalize">' + value.tutorial_url + '</td>\
                                <td class="text-right">\
                                    <button title="Autodaten ändern" class="btn btn-sm btn-primary" onclick="autoBearbeiten(' + value.id + ')"><i class="fa fa-pencil"></i></button>\
                                    <button title="Auto aus Datenbank entfernen" class="btn btn-sm btn-danger" onclick="autoEntfernen(' + value.id + ')"><i class="fa fa-trash-o"></i></button>\
                                    <button title="Auto betanken" class="btn btn-sm btn-info" onclick="autoBetanken(' + value.id + ', '+value.betankungen+')"><i class="fa fa-plus"></i></button>\
                                </td>\
                                <td class="text-right">\
                                    <button title="Autodaten ändern" class="btn btn-sm btn-primary" onclick="autoBearbeiten(' + value.id + ')"><i class="fa fa-pencil"></i></button>\
                                    <button title="Auto aus Datenbank entfernen" class="btn btn-sm btn-danger" onclick="autoEntfernen(' + value.id + ')"><i class="fa fa-trash-o"></i></button>\
                                    <button title="Auto betanken" class="btn btn-sm btn-info" onclick="autoBetanken(' + value.id + ', '+value.betankungen+')"><i class="fa fa-plus"></i></button>\
                                </td>\
                                <td class="text-center">\
                               		<button title="Eintrag ändern" class="btn btn-sm btn-primary" onclick="bearbeiten(' + value.id + ')"><i class="fa fa-pencil"></i></button>\
                                    <button title="Eintrag aus Datenbank entfernen" class="btn btn-sm btn-danger" onclick="entfernen(' + value.id + ')"><i class="fa fa-trash-o"></i></button>\
                                </td>\
                            </tr > ';
					});

					$('#daten').html(html);
                    $('#liste').fadeIn(100, function() {
                        $(this).removeClass('hidden');
                    });
				}
			},
			error: function(error) {
                // Wenn von PHP keine validen Daten empfangen werden
                console.error(error);
            },
            complete: function() {
                // Wird immer ausgeführt, egal ob Fehler oder nicht
                console.warn('Funktionsaufruf beendet!')
            },
		});
	}
}

function entfernen(id) {
	//console.clear();
	console.warn('Funktionsaufruf gestartet...');
	var check = (id) ? true : false;

	if (check) {
		$.ajax({
			type: "POST",
			url: "app/View.php",
			data: { aktion: 'entfernen', id: id },
			dataType: "JSON",
			beforeSend: function() {
				console.log('Eintrag wird gelöscht, beforeSend!');
			},
			success: function(daten){
				console.log('Eintrag wurde gelöscht');
				console.log(daten);
				auflisten();
			},
			error: function(error){
				console.error(error);
			},
			complete: function() {
				console.warn('Funktionsaufruf beendet!')
			},
		});
	}
}

function bearbeiten(id) {
	console.warn('Funktionsaufruf gestartet...');
	var check = (id) ? true : false;

	if (check) {
		$.ajax({
			type: "POST",
			url: "app/View.php",
			data: { aktion: 'bearbeiten', id: id},
			dataType: "JSON",
			beforeSend: function() {
				console.log('Eintrag wird bearbeitet, beforeSend!');
			},
			success: function(daten) {
				console.log('Eintrag wurde bearbeitet');
				console.log(daten);
				$('.inputs input, .inputs select').addClass('focus');
				$('#beschreib').val('setValue', daten[0].id);
                $('#beschreib').val('setValue', daten[0].tutorial_beschreib);
                $('#what').val('setValue', daten[0].tutorial_what);
                $('#website').val('setValue', daten[0].tutorial_url);
			},
			error: function(error) {
				console.error(error);
			},
			complete: function() {
				console.warn('Funktionsaufruf beendet')
			},
		});
	}
}

function install() {
	console.warn('Installation wird gestartet');
	var check = true;

	if (check) {
		$.ajax({
			type: "POST",
			url: "app/View.php",
			data: { aktion: 'install'},
			datatype: "JSON",
			beforeSend: function() {
				console.log('Installation wird ausgeführt, beforeSend!');
			},
			success: function(daten) { 
				console.log(daten);
				console.log('Installation wurde ausgeführt');
			},
			error: function() {
				console.log('error');
			},
			complete: function() {
				console.log('Installation beendet');
			},
		});
	}
}
