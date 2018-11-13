Element.prototype.remove = function() {
	this.parentElement.removeChild(this);
}
NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
	for (var i = this.length - 1; i >= 0; i--) {
		if (this[i] && this[i].parentElement) {
			this[i].parentElement.removeChild(this[i]);
		}
	}
}


if (!Object.keys) {
	Object.keys = (function() {
		'use strict';
		var hasOwnProperty = Object.prototype.hasOwnProperty,
				hasDontEnumBug = !({ toString: null }).propertyIsEnumerable('toString'),
				dontEnums = [
					'toString',
					'toLocaleString',
					'valueOf',
					'hasOwnProperty',
					'isPrototypeOf',
					'propertyIsEnumerable',
					'constructor'
				],
				dontEnumsLength = dontEnums.length;

		return function(obj) {
			if (typeof obj !== 'function' && (typeof obj !== 'object' || obj === null)) {
				throw new TypeError('Object.keys called on non-object');
			}

			var result = [], prop, i;

			for (prop in obj) {
				if (hasOwnProperty.call(obj, prop)) {
					result.push(prop);
				}
			}

			if (hasDontEnumBug) {
				for (i = 0; i < dontEnumsLength; i++) {
					if (hasOwnProperty.call(obj, dontEnums[i])) {
						result.push(dontEnums[i]);
					}
				}
			}
			return result;
		};
	}());
}


function rbtLoad(selector) {
	
	    // LOAD CONTENT
    var container = closest(document.getElementById(selector), 'div#rbt-container');
    var settings = container.querySelector('textarea.rbt-output').value ? JSON.parse(container.querySelector('textarea.rbt-output').value) : {
      "controls": {
        "locked": false,
        "maxrows": -1,
        "fields": []
      },
      "data": [{
        "v0": ""
      }]
    };
    if (settings) {

      var metaValues = settings.controls || {
        locked: false,
        fields: [],
        maxrows: -1
      };
	  
	  var maxrows = metaValues.maxrows;

      if (settings.data) {

        if (settings.data.length == 0 && metaValues.fields.length > 0) {

          for (var i = 0; i < metaValues.fields.length; i++) {
            settings.data.push({});
            settings.data[i]["v" + 0] = "";
          }
        }
        // delete all rows
        var rows = container.querySelectorAll('div.row div#data');
        rows.forEach(function(row) {
          row.parentNode.remove();
        });

        //load values


        // create row

        var rowData = settings.data;


        var columns = Object.keys(settings.data[0]).length;
        var fields = metaValues.fields.length;

        for (var i = 0; i < settings.data.length; i++) {

          var row = document.createElement('div');
          row.className = "row";

          row.innerHTML = "<div id=\"data\" class=\"table\"></div>";
          // append field name
          var label = i % fields;
          if (label == (fields - 1)) {
            row.className += " divider";
          }

          row.querySelector('div#data').appendChild(createHeading(metaValues.fields[label]));
          row.querySelector('div#data').appendChild(createTextarea("multi[" + i + "][0]", settings.data[i]["v0"], metaValues.fields[label]));

          container.querySelector('div#table').appendChild(row);

        }

        //update row lock
        rows = container.querySelectorAll('div.row div#data');
        locked(rows.length, container);
        if (rows.length >= maxrows && maxrows !== -1) {
          locked(2, container, "maxrows");
        }
        // end insert

      }
      return;


    }
	
}

function showExtraBlocks() {
	
	var tabsList = [ document.querySelector('div#category_info_tabs_group_45_content'), document.querySelector('div#category_info_tabs_group_46_content'), document.querySelector('div#category_info_tabs_group_47_content'), document.querySelector('div#category_info_tabs_group_48_content'), 
			document.querySelector('div#category_info_tabs_group_49_content'), document.querySelector('div#category_info_tabs_group_50_content'),
			document.querySelector('div#category_info_tabs_group_51_content'),document.querySelector('div#category_info_tabs_group_52_content') ];
			
			for(var i = 0; i<tabsList.length; i++)
			{
				if(tabsList[i])
				{
					(function(tab) {
					
						setTimeout(function() {
						
							tab.style.display = "block";
						
						
						},0.5e3);
					
					})(tabsList[i]);
					
			
				}
			
			}
	
	
}
function jcfLoad(selector)
{
	var container = closest(document.getElementById(selector), 'div#jcf-container');
	var settings = container.querySelector('textarea.jcf-output').value ? JSON.parse(container.querySelector('textarea.jcf-output').value) : {"controls":{"locked":false,"maxrows":-1,"fields":[]},"data":[{"v0":""}]};
	if(settings)
	{
		var metaValues = settings.controls || {locked : false, fields: [], maxrows: -1};
		if(metaValues.fields && metaValues.fields.length > 0)
		{
			var headings = document.createElement('div');
			headings.className = "heading";
			headings.innerHTML = "<div id=\"data\"></div>";
			var insertPoint = headings.querySelector('div#data');
			for(var i = 0; i< metaValues.fields.length; i++)
			{
				insertPoint.appendChild(createHeading(metaValues.fields[i]));
			}
			var table = container.querySelector('div#table');
			table.insertBefore(headings, table.firstChild);

		}
		if(settings.data)
		{
  
	if(settings.data.length == 0 &&  metaValues.fields.length > 0)
	{
		settings.data.push({});
	  for(var i = 0; i<metaValues.fields.length; i++)
	  {
		settings.data[0]["v"+i] = "";
	  }
	}
			// delete all rows
			var rows = container.querySelectorAll('div.row div#data');
			rows.forEach(function(row) {
				row.parentNode.remove();
			});

			//load values

			var container = closest(document.getElementById(selector), 'div#jcf-container');
	
			// create row

			var rowData = settings.data;
			
	
	var columns = Object.keys(settings.data[0]).length;
	

			for(var i = 0; i<settings.data.length; i++)
			{

				var row = document.createElement('div');
				row.className = "row";
				row.innerHTML = "<div id=\"data\"></div>";
				for (var j = 0; j < columns; j++) {
					row.querySelector('div#data').appendChild(createInput("multi["+i+"]["+j+"]",settings.data[i]["v"+j]));
				}
				//append controls
				var controls = document.createElement('div');
				controls.id = "columns";
				controls.innerHTML = "<span id=\"add-column\">+</span><span id=\"remove-column\">-</span>";
				row.appendChild(controls);
				container.querySelector('div#table').appendChild(row);

			}

			//update row lock
			rows = container.querySelectorAll('div.row div#data');
			locked(rows.length, container);
			if(rows.length >= settings.maxrows && settings.maxrows !== -1)
			{
				locked(2,container,"maxrows");
			}
			// end insert

		}
		return;


	}


}



function closest(el, selector) {
	var matchesFn;

	// find vendor prefix
	['matches', 'webkitMatchesSelector', 'mozMatchesSelector', 'msMatchesSelector', 'oMatchesSelector'].some(function(fn) {
		if (typeof document.body[fn] == 'function') {
			matchesFn = fn;
			return true;
		}
		return false;
	})

	var parent;

	// traverse parents
	while (el) {
		parent = el.parentElement;
		if (parent && parent[matchesFn](selector)) {
			return parent;
		}
		el = parent;
	}
	return null;
}


function saveContent(event,target) {

	if(window && window.product_info_tabsJsTabs)
	{
		locked(2, product_info_tabsJsTabs.activeTab, "changed");
	}

	var container = target ? event : closest(event.target, 'div#jcf-container');
	var output = { controls: {}, data: [] };
	container.querySelectorAll('div.row').forEach(function(row) {
		var temp = {}, index = 0;
		row.querySelectorAll('div#data input').forEach(function(cell) {
			temp["v"+index] = cell.value;
			index++;
		});
		output.data.push(temp);

	});
	var textarea = container.querySelector('textarea.jcf-output');

	output.controls = textarea && textarea.value && textarea.value.length > 0 && JSON.parse(textarea.value) && JSON.parse(textarea.value)['controls'] ? JSON.parse(textarea.value).controls : getMetaSettings(container);

	textarea.value = JSON.stringify(output);

	return;

}


function rSaveContent(event, target) {

  if (window && window.product_info_tabsJsTabs) {
    locked(2, product_info_tabsJsTabs.activeTab, "changed");
  }

  var container = target ? event : closest(event.target, 'div#rbt-container');
  var output = {
    controls: {},
    data: []
  };
  container.querySelectorAll('div.row').forEach(function(row) {
    var temp = {},
      index = 0;
    row.querySelectorAll('div#data textarea').forEach(function(cell) {
      temp["v" + index] = cell.value;
      index++;
    });
    output.data.push(temp);

  });
  var textarea = container.querySelector('textarea.rbt-output');

  output.controls = textarea && textarea.value && textarea.value.length > 0 && JSON.parse(textarea.value) && JSON.parse(textarea.value)['controls'] ? JSON.parse(textarea.value).controls : getMetaSettings(container);

  textarea.value = JSON.stringify(output);

  return;

}


function createHeading(value)
{
	var element = document.createElement('h4');
	element.className = "flex";
	element.textContent = value ? value : "";
	return element;
}

function createInput(name, value)
{
	var element = document.createElement('input');
	element.type = "text";
	element.className = "flex";
	element.name = name;
	element.value = value ? value : "";
	return element;

}


function createTextarea(name, value, label) {
  var element = document.createElement('textarea');
  element.type = "text";
  
  element.className = "flex";
  if (label && label.toLowerCase().indexOf("content") > -1) {
    element.className += " content";
  }
  element.name = name;
  element.value = value ? value : "";
  return element;

}

function insertAfter(newElement, targetElement) {
	// target is what you want it to go after. Look for this elements parent.
	var parent = targetElement.parentNode;

	// if the parents lastchild is the targetElement...
	if (parent.lastChild == targetElement) {
		// add the newElement after the target element.
		parent.appendChild(newElement);
	} else {
		// else the target has siblings, insert the new element between the target and it's next sibling.
		parent.insertBefore(newElement, targetElement.nextSibling);
	}
}



function getMetaSettings(container)
{
	var metaBox = container.querySelector('textarea.jcf-output') || container.querySelector('textarea.rbt-output');
	var meta = metaBox && metaBox.value || "{}";
	meta = JSON.parse(meta);
	var maxrows = meta["controls"] && meta["controls"]["maxrows"] ? parseInt(meta["controls"]["maxrows"]) : -1;
	var locked = meta["controls"] && meta["controls"]["locked"] ? meta["controls"]["locked"] : false;
	var fields = meta["controls"] && meta["controls"]["fields"] && meta["controls"]["fields"].length > 0 ? meta["controls"]["fields"] : [];
	return { "locked": locked, "maxrows" : maxrows, "fields" : fields };
}

function locked(rows, container, message) {
	var message = message || "locked";
	if (rows > 1) {
		if (container.className.indexOf(message) < 0) {
			container.className += " "+message;
		}
	} else {
		container.className = container.className.replace(" "+message, "");
	}

}

document.addEventListener("input", function(event) {
	if(event.target.matches('div#jcf-container div#table div.row div#data input.flex'))
	{
		saveContent(event);
		return;

	}
	
	if (event.target.matches('div#rbt-container div#table div.row div#data textarea.flex')) {
		rSaveContent(event);
		return;
  }

});

function hideExtraTabs() {
	
	var tabs = document.querySelectorAll('a#category_info_tabs_group_45, a#category_info_tabs_group_46, a#category_info_tabs_group_47, a#category_info_tabs_group_48, a#category_info_tabs_group_49, a#category_info_tabs_group_50, a#category_info_tabs_group_51, a#category_info_tabs_group_52');

	for(var i = 0; i < tabs.length; i++)
	{
		tabs[i].parentNode.style.display = "none";
	}
	
}

document.addEventListener("DOMContentLoaded", function() {
	
	hideExtraTabs();
	if(document.querySelector('a#category_info_tabs_group_30').className.indexOf("active") > -1)
	{
		showExtraBlocks();
	}
	
});


(function() {
    var proxied = window.XMLHttpRequest.prototype.send;
    window.XMLHttpRequest.prototype.send = function() {
        if(arguments && arguments[0] && arguments[0].indexOf("active_tab_id=category_info_tabs_") > -1)
           {
        var pointer = this
        var intervalId = window.setInterval(function(){
                if(pointer.readyState != 4){
                        return;
                }
				setTimeout(function() {
				
				hideExtraTabs();
				if(document.querySelector('a#category_info_tabs_group_30').className.indexOf("active") > -1)
				{
					showExtraBlocks();
				}
                clearInterval(intervalId);
				},1e3);
				
        }, 1);
         }
        return proxied.apply(this, [].slice.call(arguments));
    };


})();


document.addEventListener("click", function(event) {
	
	// stuff for rbt-container
	
  if (event.target.matches('div#rbt-container div#controls span#remove-box')) {
    var container = closest(event.target, 'div#rbt-container');

    var rows = container.querySelectorAll('div.row div#data');

    var metaSettings = getMetaSettings(container);
    // remove column
    if (rows.length > metaSettings.fields.length) {


      for (var i = 0; i < metaSettings.fields.length; i++) {

        rows[rows.length - (i + 1)].parentNode.remove();

      }

      rSaveContent(container, true);
      return;

    }
  }


  if (event.target.matches('div#rbt-container div#controls span#add-box')) {
    var container = closest(event.target, 'div#rbt-container');
    var metaValues = getMetaSettings(container);
    var maxrows = metaValues.maxrows;
    var rows = container.querySelectorAll('div.row div#data');
    if (rows.length >= maxrows && maxrows !== -1) {
      return;
    }



    // create rows

    var fields = metaValues.fields.length;

    for (var i = fields - 1; i >= 0; i--) {

      var row = document.createElement('div');
      var label = i % fields;
      row.className = "row";
      row.innerHTML = "<div id=\"data\" class=\"table\"></div>";



      row.querySelector('div#data').appendChild(createHeading(metaValues.fields[label]));
      row.querySelector('div#data').appendChild(createTextarea("multi[" + (rows.length + i) + "][0]", "", metaValues.fields[label]));
      insertAfter(row, rows[rows.length - 1].parentNode);


    }





    //update row lock
    rows = container.querySelectorAll('div.row div#data');
    locked(rows.length, container);
    if (rows.length >= maxrows && maxrows !== -1) {
      locked(2, container, "maxrows");
    }
    return;

  }
  if (event.target.matches('div#rbt-container div#controls span#save-content')) {
    rSaveContent(event);
  }
  if (event.target.matches('div#rbt-container div#controls span#load-content')) {

    // LOAD CONTENT
    var container = closest(event.target, 'div#rbt-container');
    var settings = container.querySelector('textarea.rbt-output').value ? JSON.parse(container.querySelector('textarea.rbt-output').value) : {
      "controls": {
        "locked": false,
        "maxrows": -1,
        "fields": []
      },
      "data": [{
        "v0": ""
      }]
    };
    if (settings) {

      var metaValues = settings.controls || {
        locked: false,
        fields: [],
        maxrows: -1
      };

      if (settings.data) {

        if (settings.data.length == 0 && metaValues.fields.length > 0) {

          for (var i = 0; i < metaValues.fields.length; i++) {
            settings.data.push({});
            settings.data[i]["v" + 0] = "";
          }
        }
        // delete all rows
        var rows = container.querySelectorAll('div.row div#data');
        rows.forEach(function(row) {
          row.parentNode.remove();
        });

        //load values

        var container = closest(event.target, 'div#rbt-container');

        // create row

        var rowData = settings.data;


        var columns = Object.keys(settings.data[0]).length;
        var fields = metaValues.fields.length;

        for (var i = 0; i < settings.data.length; i++) {

          var row = document.createElement('div');
          row.className = "row";

          row.innerHTML = "<div id=\"data\" class=\"table\"></div>";
          // append field name
          var label = i % fields;
          if (label == (fields - 1)) {
            row.className += " divider";
          }

          row.querySelector('div#data').appendChild(createHeading(metaValues.fields[label]));
          row.querySelector('div#data').appendChild(createTextarea("multi[" + i + "][0]", settings.data[i]["v0"], metaValues.fields[label]));

          container.querySelector('div#table').appendChild(row);

        }

        //update row lock
        rows = container.querySelectorAll('div.row div#data');
        locked(rows.length, container);
        if (rows.length >= maxrows && maxrows !== -1) {
          locked(2, container, "maxrows");
        }
        // end insert

      }
      return;


    }
  }	
	
	// end 

	if (event.target.matches('div#jcf-container div#columns span#add-column')) {
		// add column
		var container = closest(event.target, 'div#jcf-container');
		if(getMetaSettings(container).locked)
		{
			return;
		}
		var rows = container.querySelectorAll('div.row div#data');
		if (rows.length < 2) {
			var parent = closest(event.target, 'div.row').querySelector('div#data');
			var columns = parent.querySelectorAll('input').length;
			if(columns<11)
			{
				var create = createInput("multi[0]["+columns+"]");
				parent.appendChild(create);
			}
		}
		return;
	}
	if (event.target.matches('div#jcf-container div#columns span#remove-column')) {
		var container = closest(event.target, 'div#jcf-container');


		var rows = container.querySelectorAll('div.row div#data');
		// remove column
		var parent = closest(event.target, 'div.row').querySelector('div#data');
		if (rows.length < 2) {

			if(getMetaSettings(container).locked)
			{
				return;
			}
			
			parent.querySelector('input:last-child').remove();
			saveContent(container,true);
		} 
		else {
			parent.parentNode.remove();

			rows = container.querySelectorAll('div.row div#data');
			locked(rows.length, container);
			var maxrows = getMetaSettings(container).maxrows;
			console.log(maxrows);

			if(rows.length < maxrows || maxrows === -1)
			{
				locked(1,container,"maxrows");
			}
			saveContent(container,true);
			return;

		}
	}
	if (event.target.matches('div#jcf-container div#controls span#add-row')) {
		var container = closest(event.target, 'div#jcf-container');
		var maxrows = getMetaSettings(container).maxrows;
		var rows = container.querySelectorAll('div.row div#data');
		if(rows.length >= maxrows && maxrows !== -1)
		{
			return;
		}

		// create row
		var row = document.createElement('div');
		row.className = "row";
		row.innerHTML = "<div id=\"data\"></div>";

		// work out columns
		var columns = 1;
		if (rows.length > 0) {
			columns = rows[0].querySelectorAll('input').length;
		}
		for (var i = 0; i < columns; i++) {
			row.querySelector('div#data').appendChild(createInput("multi["+rows.length+"]["+i+"]"));
		}

		//append controls
		var controls = document.createElement('div');
		controls.id = "columns";
		controls.innerHTML = "<span id=\"add-column\">+</span><span id=\"remove-column\">-</span>";
		row.appendChild(controls);

		//insert row
		insertAfter(row, rows[rows.length - 1].parentNode);

		//update row lock
		rows = container.querySelectorAll('div.row div#data');
		locked(rows.length, container);
		if(rows.length >= maxrows && maxrows !== -1)
		{
			locked(2,container,"maxrows");
		}
		return;

	}
	if(event.target.matches('div#jcf-container div#controls span#save-content'))
	{
		saveContent(event);
	}
	if(event.target.matches('div#jcf-container div#controls span#load-content'))
	{
	
	  // LOAD CONTENT
		var container = closest(event.target, 'div#jcf-container');
		var settings = container.querySelector('textarea.jcf-output').value ? JSON.parse(container.querySelector('textarea.jcf-output').value) : {"controls":{"locked":false,"maxrows":-1,"fields":[]},"data":[{"v0":""}]};
		if(settings)
		{
			var metaValues = settings.controls || {locked : false, fields: [], maxrows: -1};
			if(metaValues.fields && metaValues.fields.length > 0)
			{
				var headings = document.createElement('div');
				headings.className = "heading";
				headings.innerHTML = "<div id=\"data\"></div>";
				var insertPoint = headings.querySelector('div#data');
				for(var i = 0; i< metaValues.fields.length; i++)
				{
					insertPoint.appendChild(createHeading(metaValues.fields[i]));
				}
				var table = container.querySelector('div#table');
				table.insertBefore(headings, table.firstChild);

			}
			if(settings.data)
			{
      
      	if(settings.data.length == 0 &&  metaValues.fields.length > 0)
        {
        	settings.data.push({});
          for(var i = 0; i<metaValues.fields.length; i++)
          {
          	settings.data[0]["v"+i] = "";
          }
        }
				// delete all rows
				var rows = container.querySelectorAll('div.row div#data');
				rows.forEach(function(row) {
					row.parentNode.remove();
				});

				//load values

				var container = closest(event.target, 'div#jcf-container');
        
				// create row

				var rowData = settings.data;
				
        
        var columns = Object.keys(settings.data[0]).length;
        

				for(var i = 0; i<settings.data.length; i++)
				{

					var row = document.createElement('div');
					row.className = "row";
					row.innerHTML = "<div id=\"data\"></div>";
					for (var j = 0; j < columns; j++) {
						row.querySelector('div#data').appendChild(createInput("multi["+i+"]["+j+"]",settings.data[i]["v"+j]));
					}
					//append controls
					var controls = document.createElement('div');
					controls.id = "columns";
					controls.innerHTML = "<span id=\"add-column\">+</span><span id=\"remove-column\">-</span>";
					row.appendChild(controls);
					container.querySelector('div#table').appendChild(row);

				}

				//update row lock
				rows = container.querySelectorAll('div.row div#data');
				locked(rows.length, container);
				if(rows.length >= maxrows && maxrows !== -1)
				{
					locked(2,container,"maxrows");
				}
				// end insert

			}
			return;


		}
	} // end load
	return;
});

document.addEventListener("mousedown", function(event) {
	var target = event.target;
	if(target.matches('a.tab-item-link span')) {
		hideExtraTabs();
		if(target.matches('a#category_info_tabs_group_30 span'))
        {
			
			showExtraBlocks();

            
        }
		
    }

});