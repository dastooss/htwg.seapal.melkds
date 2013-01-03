var tripID;
var data_field;
$(function() {
	var params = decodeURI(document.URL);
	var pos = params.indexOf('=');
	pos++;
	tripID = params.slice(pos);
	updateForm();
	updateList();
});

function updateForm() {
	$.ajax({
			type: 'POST',
			url: 'select_tripinfo.php',
			data: {
				'tripID' : tripID
			},
			success: function(data) {
				data_field = $.parseJSON(data);
				// Bei Crew-String Leerzeichen durch Zeilenumbruch ersetzen
				var crew = data_field[0].crew;
				while (crew.indexOf(' ') != -1) {
					crew = crew.replace(' ', '\n');
				}
				document.getElementById('triptitle').setAttribute('value', data_field[0].triptitle);
				document.getElementById('von').setAttribute('value', data_field[0].von);
				document.getElementById('nach').setAttribute('value', data_field[0].nach);
				document.getElementById('skipper').setAttribute('value', data_field[0].skipper);
				document.getElementById('crew').innerHTML = crew;
				document.getElementById('start').setAttribute('value', data_field[0].start);
				document.getElementById('ende').setAttribute('value', data_field[0].ende);
				document.getElementById('dauer').setAttribute('value', data_field[0].dauer);
				document.getElementById('motor').setAttribute('value', data_field[0].motor);
				document.getElementById('tank').setAttribute('value', 'true');
			}
	}).error(function() {
		alert("Error on updating Form");
	});
}

function updateList() {
	$.ajax({
			type: 'POST',
			url: 'select_entryinfo.php',
			data: {
				'tripID' : tripID
			},
			success: function(data) {
				data_field = $.parseJSON(data);
				var listContent = "";
				for(var i = 0; i < data_field.length; i++) {
					listContent = listContent + "<tr class=\"tripinfo_table_nolink\" id="+ i +" onMouseOver=\"javaScript:updateStyle(this.id)\" onMouseOut=\"javaScript:updateStyle(this.id)\" onClick=\"javaScript:loadTrip(this.id)\">"
								  +	"<td id=\"tripname\" class=\"tripinfo_table_row\">"
						   		  + data_field[i].name + "</td><td class=\"tripinfo_table_row\">"
						   		  + data_field[i].zeitpunkt + "min" + "</td><td class=\"tripinfo_table_row\">"
						  		  + data_field[i].gradn + "&deg;" + data_field[i].minn + "\'" + data_field[i].sekn + "\''" + "</td><td class=\"tripinfo_table_row\">"
						   		  + data_field[i].grade + "&deg;" + data_field[i].mine + "\'" + data_field[i].seke + "\''" + "</td><td class=\"tripinfo_table_row\">"
						   		  + data_field[i].cog + "</td><td>"
								  +	data_field[i].sog + "</td><td class=\"tripinfo_table_row\" style=\"text-align: center\">"
								  + "<input type=\"image\" src=\"\images\\button.png\" onClick=\"javaScript:openEntry(this.parentNode.parentNode.id)\"></td></tr>";
				}

				var list = document.getElementById('tripinfo_list');
				list.innerHTML = listContent;
			}
	}).error(function() {
		alert("Error on updating Form");
	});
}

function updateStyle(index) {
	if (document.getElementById(index).className=='tripinfo_table_link_click') {
		document.getElementById(index).className='tripinfo_table_link_click';
	}

	if (document.getElementById(index).className=='tripinfo_table_nolink') {
		document.getElementById(index).className='tripinfo_table_link';
	} else if (document.getElementById(index).className=='tripinfo_table_link') {
		document.getElementById(index).className='tripinfo_table_nolink';
	}
}

function openEntry(id) {
	
}